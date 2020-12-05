@extends('layouts.weelcome.app')
@section('link-css')
    <link rel="stylesheet" href="{{asset('css/loja/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fullcalendar/lib/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/medico/agenda.css')}}">
@endsection

@section('content')
    <div class="container ajuste">
        <div id='wrap'>

            <div id='external-events'>
                <h4>Eventos</h4>

                <div id='external-events-list'>
                    <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>Adiciona dia de consulta</div>
                    </div>
                </div>

                <p>
                    <input type='checkbox' id='drop-remove'/>
                    <label for='drop-remove'>remove after drop</label>
                </p>
            </div>

            <div id='calendar-wrap'>
                <div id='calendar' data-route-load-agenda="{{route('routeLoadAgenda')}}"></div>
            </div>

        </div>
    </div>
@endsection

@section('link-scirpt')
    <script src="{{asset('assets/fullcalendar/lib/main.min.js')}}"></script>
    <script src="{{asset('js/medico/script.js')}}"></script>
    {{--    CONFIGURACAO DO CALENDARI--}}
    <script src="{{asset('js/medico/calender.js')}}"></script>
    <script src="{{asset('assets/fullcalendar/lib/locales-all.min.js')}}"></script>
@endsection


