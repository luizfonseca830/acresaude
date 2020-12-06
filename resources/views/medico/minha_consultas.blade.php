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
                <th scope="col">Data</th>
                <th scope="col">Staus</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($consultas as $consulta)
                <tr>
                    <th>{{$consulta->id}}</th>
                    <th>{{$consulta->data_consulta}}</th>
                    @if (strtotime($consulta->data_consulta) >= strtotime('Y-m-d H:i:s') && is_null($consulta->status_finalizado))
                        <th class="text-info">Você precisar entrar nessa consulta!</th>
                    @elseif(strtotime($consulta->data_consulta) < strtotime('Y-m-d H:i:s') && is_null($consulta->status_finalizado))
                        <th class="text-info">Ainda não está no dia da consulta!</th>
                    @else
                        <th class="text-success">Atendido</th>
                        <th><a href="#"><i class="fas fa-file-pdf fa-2x"></i></a></th>
                    @endif
                    {{--Acoes--}}
                    @if (strtotime($consulta->data_consulta) >= strtotime('Y-m-d H:i:s') && is_null($consulta->sala_consulta))
                        <th><a href="{{route('medico.consultas.update', $consulta->id)}}"><i class="fas fa-play fa-2x"></i></a></th>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
