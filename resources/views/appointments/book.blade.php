<x-app>
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='utf-8'/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css">


        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>


        <script>
            var SITEURL = "{{ url('/') }}";

            $(document).ready(function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {

                    timeZone: 'Europe/London',
                    events: SITEURL + '/availability/json',

                    selectable: false,
                    // editable: true,
                    businessHours: true,
                    displayEventTime: true,

                    initialView: 'dayGridMonth',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },

                    eventDidMount: function (info) {
                        $(info.el).tooltip({
                            title: 'This appointment is with: ' + info.event.extendedProps.user_name,
                            placement: 'top',
                            trigger: 'hover',
                            container: 'body'

                        });

                    },

                    dateClick: function (info) {
                        calendar.changeView('timeGridDay', info.dateStr);
                    },

                    eventClick: function (info) {
                        var eventBook = confirm("Do you want to book this appointment with " + info.event.extendedProps.user_name + "?");
                        var eventObj = info.event;

                        if (eventBook) {
                            var comment = prompt("Please add any comments for this appointment (optional)");
                            $.ajax({
                                url: SITEURL + '/appointments',
                                data: {
                                    user_id: {{auth()->user()->id}},
                                    counsellor_id: eventObj.extendedProps.user_id,
                                    user_name: eventObj.extendedProps.user_name,
                                    start: eventObj.startStr,
                                    end: eventObj.endStr,
                                    comments: comment
                                },
                                type: 'POST',
                                success: function () {
                                    $.ajax({
                                        url: SITEURL + '/availability',
                                        data: {
                                            id: eventObj.id
                                        },
                                        type: 'DELETE',
                                        success: function () {
                                            eventObj.remove();
                                        }

                                    })
                                    eventObj.remove();
                                    alert('Your appointment has been successfully booked');
                                }

                            })
                        }

                    }
                });


                calendar.render();
            });


        </script>
    </head>

    <div class="container">
        <div class="justify-content-center">
            <div class="card">
                <div class="card-header bg-blue-5">Appointments</div>

                <div class="card-body container-fluid">
                    <div class="h5 text-center">
                        <p>Please select an available slot from below to book an appointment</p>

                    </div>
                    <br>
                    <div id='calendar'></div>
                </div>

            </div>
        </div>
    </div>

    <br>
    </html>
</x-app>
