@extends('base.layout')

<link href='{{asset("assets/css/fullcalendar/core/main.min.css")}}' rel='stylesheet' />
<link href='{{asset(("assets/css/fullcalendar/daygrid/main.min.css"))}}' rel='stylesheet' />

<script src='{{asset("assets/js/fullcalendar/core/main.min.js")}}'></script>
<script src='{{asset("assets/js/fullcalendar/daygrid/main.min.js")}}'></script>
<script src='{{asset("assets/js/fullcalendar/interaction/main.min.js")}}'></script>
<script src='{{asset('assets/js/jquery-3.4.1.min.js')}}'></script>
<script src='{{asset("assets/js/fullcalendar/core/locale/pt-br.js")}}'></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'pt-br',
            plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
            selectable: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            "eventColor": 'red',
            events: {
                url: '{{route('calendar.getInfos')}}',
                method: 'GET',
                failure: function() {
                    alert('there was an error while fetching events!');
                }
            }
        });
        calendar.render();
    });
</script>

@section('content')
    <div id='calendar'></div>
@endsection