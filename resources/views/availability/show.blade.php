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

                    selectable: true,
                    // editable: true,
                    businessHours: true,
                    displayEventTime: true,
                    selectMinDistance: 2,

                    initialView: 'dayGridMonth',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    dateClick: function (info) {
                        calendar.changeView('timeGridDay', info.dateStr);
                    },
                    select: function (info) {
                        calendar.addEvent({
                            user_id: {{auth()->user()->id}},
                            user_name: '{{auth()->user()->name}}',
                            start: info.startStr,
                            end: info.endStr
                        });

                        $.ajax({
                            url: SITEURL + '/availability',
                            data: {
                                user_id: {{auth()->user()->id}},
                                user_name: '{{auth()->user()->name}}',
                                start: info.startStr,
                                end: info.endStr
                            },
                            type: 'POST',
                            success: function () {
                                alert('Your availability has been successfully ');
                            }

                        })
                    },
                    eventClick: function (info) {
                        var eventDelete = confirm("Do you want to remove this?");
                        var eventObj = info.event;

                        if (eventDelete) {
                            $.ajax({
                                url: SITEURL + '/availability',
                                data: {
                                    id: eventObj.id
                                },
                                type: 'DELETE',
                                success: function () {
                                    eventObj.remove();
                                    alert('Availability sucessfully deleted');
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
                <div class="card-header">Availability</div>

                <div class="card-body container-fluid">
                    <div class="h5 text-center">
                        <p>Please select a day where you want to set availability</p>
                        <p>You can drag along the times to set availability</p>
                    </div>
                    <br>
                    <div id='calendar'></div>
                </div>

            </div>
        </div>
    </div>

    </html>
</x-app>
