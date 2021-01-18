@extends('layouts.weelcome.app')
@section('link-css')
    <link rel="stylesheet" href="{{asset('css/loja/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fullcalendar/lib/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/medico/agenda.css')}}">
@endsection

@section('content')
    @include('medico.modal-calendar')
    <div class="container ajuste">
        <div class="row new_agenda">
            <a data-toggle="modal" data-target="#agenda"><input type="button" class="btn btn-outline-primary" value="Adicionar na Agenda"></a>
        </div>
        @if(session()->has('sucess'))
            <div class="alert alert-success">{{ session('sucess') }}</div>
            {{session()->forget('sucess')}}
        @endif
        <div id='wrap'>
            <div id='calendar-wrap'>
                <div id='calendar'
                     data-route-load-agenda="{{route('routeLoadAgenda')}}"
                     data-route-event-update="{{route('routeUpdateAgenda')}}"
                     data-route-event-store="{{route('routeStoreAgenda')}}"
                     data-route-event-drop-update="{{route('routeDropUpdateAgenda')}}"
                     data-route-event-delete="{{route('routeDeleteAgenda')}}"
                ></div>
            </div>
        </div>
    </div>

    {{--    MODAL--}}
    <div class="modal fade" id="agenda" tabindex="-1" role="dialog" aria-labelledby="agenda" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informações da Agenda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('routeStoreAgenda')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputTitulo">Título</label>
                            <input type="text" class="form-control" name="titulo" id="exampleInputTitulo" placeholder="Digito o título" required>
                            @error('titulo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputSelectEspecialidades">Especialidades</label>
                            <select class="form-control" name="auxEspecialidade" id="inputSelectEspecialidades">
                                <option value="">Não Selecionado</option>
                                @foreach(auth()->user()->pessoa->medico->auxEspecialidades as $auxEspecialidade)
                                    <option value="{{$auxEspecialidade->id}}">{{$auxEspecialidade->especialidade->especialidade}}</option>
                                @endforeach
                            </select>
                            @error('auxEspecialidade')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputDateInicio">Data de Início</label>
                            <input type="datetime-local" name="start" class="form-control" id="exampleInputDateInicio" required>
                            @error('start')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputDateFim">Data de Finalização</label>
                            <input type="datetime-local" name="end" class="form-control" id="exampleInputDateFim" required>
                            @error('end')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputIntervalo">Tempo de intervalo entre consultas (Minutos)</label>
                            <input type="number" class="form-control" name="intervalo" id="inputIntervalo" value="15"/>
                            @error('intervalo')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputDesc">Descrição</label>
                            <textarea class="form-control" name="descricao" id="exampleInputDesc" rows="2"></textarea>
                            @error('descricao')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fecha</button>
                        <input type="submit" class="btn btn-primary" value="Confirmar Compra">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('link-scirpt')
    <script src="{{asset('assets/fullcalendar/lib/main.min.js')}}"></script>
    <script src="{{asset('assets/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js')}}"></script>
    <script src="{{asset('assets/jquery/momenet.js')}}"></script>
    <script src="{{asset('js/medico/script.js')}}"></script>
    {{--    CONFIGURACAO DO CALENDARI--}}
    <script src="{{asset('js/medico/calender.js')}}"></script>
    <script src="{{asset('assets/fullcalendar/lib/locales-all.min.js')}}"></script>
@endsection


