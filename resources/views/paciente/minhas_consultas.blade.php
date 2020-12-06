@extends('layouts.weelcome.app')
@section('link-css')
    <link rel="stylesheet" href="{{asset('css/loja/style.css')}}">
@endsection
@section('content')
    <meta http-equiv="refresh" content="30"/>
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
                    @if(is_null($consulta->sala_consulta))
                        <th class="text-info">Não é o dia da consulta ou o Médico não criou a sala!</th>
                    @else
                        <th class="text-success">Sala aberta ou Concluída.</th>
                    @endif
                    @if(!is_null($consulta->sala_consulta) && is_null($consulta->status_finalizado))
                        <th><a href="{{route('paciente.carregarsala', $consulta->id)}}"><i class="fa fa-user-clock"></i></a>
                        </th>
                    @endif
                    @if(!is_null($consulta->status_finalizado))
                        <th><a href="#"><i class="fa fa-file-pdf fa-2x"></i></a></th>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
