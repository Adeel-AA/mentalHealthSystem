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
                    events: SITEURL + '/appointments/json',

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
                            title: 'This appointment will be with: ' + info.event.extendedProps.user_name,
                            placement: 'top',
                            trigger: 'hover',
                            container: 'body'

                        });

                    },

                    dateClick: function (info) {
                        calendar.changeView('timeGridDay', info.dateStr);
                    },

                    eventClick: function (info) {
                        var eventDelete = confirm("Do you want to cancel this appointment?");
                        var eventObj = info.event;

                        if (eventDelete) {
                            $.ajax({
                                url: SITEURL + '/appointments',
                                data: {
                                    id: eventObj.id
                                },
                                type: 'DELETE',
                                success: function () {
                                    eventObj.remove();
                                    alert('Appointment successfully cancelled');

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
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-blue-5">My Appointments</div>
                    <div class="card-body container-fluid">
                        <div class="h5 text-center">
                            @if($appointments->isEmpty())
                                <p>You have no appointments</p>
                            @endif
                        </div>

                        <ul class="list-group">
                            @foreach($appointments as $appointment)
                                <li class="list-group-item border {{$loop->last ? '' : 'mb-4'}} p-4">

                                    <medium id="appointment_with">Appointment With: {{ $appointment->user_name }}
                                        <br>
                                    </medium>
                                    <medium id="appointment_start">
                                        Start: {{ \Carbon\Carbon::parse($appointment->start)->toRfc7231String()}}
                                        <br>
                                    </medium>
                                    <medium id="appointment_end">
                                        End: {{ \Carbon\Carbon::parse($appointment->end)->toRfc7231String()}}
                                    </medium>
                                    <small id="booked_on"
                                           class="form-text text-muted">Booked
                                        On: {{ \Carbon\Carbon::parse($appointment->created_at)->toRfc7231String()}}</small>
                                    @if($appointment->comments)
                                        <small id="comments"
                                               class="form-text text-muted">Comments: {{ $appointment->comments }}</small>
                                    @endif


                                </li>
                            @endforeach
                            {{--                                    <div class="btn btn-dark btn-lg">--}}
                            {{--                                        <a href="/surveys/{{ $questionCategory->id}}-{{ Str::slug($questionCategory->question_type) }}">Start--}}
                            {{--                                            Self-Assessment</a>--}}
                            {{--                                    </div>--}}
                        </ul>
                    </div>
                </div>
                <br>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-blue-5">My Calendar</div>

                    <div class="card-body container-fluid">
                        <div class="h5 text-center">
                            <p>Your booked appointments will be shown below</p>
                            <br>
                            <p>Click on the appointment if you would like to cancel it</p>
                        </div>
                        <br>
                        <div id='calendar'></div>
                    </div>

                </div>
                <br>
            </div>
        </div>
    </div>
    <br>
    </html>
</x-app>
