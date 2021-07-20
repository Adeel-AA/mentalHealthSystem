<x-app>
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='utf-8'/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css">

        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>


        <script>

            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    selectable: true,
                    businessHours: true,
                    initialView: 'dayGridMonth',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    dateClick: function () {
                        alert('clicked');
                    },
                    select: function () {
                        alert('selected');
                    }
                });
                calendar.render();
            });

        </script>
    </head>

    <div class="container">
        <div class="">
            <div class="">
                <div class="card">

                    <div class="card-body">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </html>
</x-app>
