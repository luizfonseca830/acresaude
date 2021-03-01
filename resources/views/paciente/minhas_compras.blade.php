@extends('layouts.weelcome.app')
@section('link-css')
    <link rel="stylesheet" href="{{asset('css/loja/style.css')}}">
@endsection
@section('content')
    <div class="container ajuste">
        @if(session()->has('sucess'))
            <div class="alert alert-success">{{ session('sucess') }}</div>
            {{session()->forget('sucess')}}
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pacote</th>
                <th scope="col">Dia Realizado</th>
                <th scope="col">Staus</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($compras as $compra)
                <tr>
                    <th>{{$compra->id}}</th>
                    <th>Consulta</th>
                    <th>{{date('d/m/Y H:i:s', strtotime( $compra->created_at))}}</th>
                    @if($compra->status_compra == 'waiting_payment')
                        <th class="text-warning font-weight-bold">Pendente</th>
                    @elseif($compra->status_compra == 'paid' && !is_null($compra->agendaConsulta))
                        @if(!is_null($compra->agendaConsulta->compra_id) && is_null($compra->agendaConsulta->sala_consulta))
                            <th class="text-success font-weight-bold">Agendado</th>
                        @elseif (!is_null($compra->agendaConsulta->status_finalizado))
                            <th class="text-success font-weight-bold">Consulta Finalizada</th>
                        @else
                            <th class="text-success font-weight-bold">Pago</th>
                        @endif
                    @elseif(!is_null($compra->agendaConsulta->compra_id) && is_null($compra->agendaConsulta->sala_consulta))
                        <th class="text-success font-weight-bold">Agendado</th>
                    @else
                        <th class="text-danger font-weight-bold">Recusado</th>
                    @endif
                    {{--ACOES--}}
                    @if(is_null($compra->agendaConsulta))
{{--                        vai servir para boleto--}}
                        <th><a href="{{route('paciente.agenda.index', $compra->id)}}"><i
                                    class="fas fa-calendar-alt fa-2x"></i></a></th>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        @if(count($compras) == 0)
            <p class="text-info font-weight-bold text-center">Nenhuma Compra realizada!</p>
        @endif
    </div>
@endsection
@section('link-scirpt')
    <script src="{{asset('assets/alertifyjs/alertify.min.js')}}"></script>
    @include('notifications.notification')
@endsection
