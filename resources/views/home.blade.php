@extends('layouts.app')

@section('content')
    <div class="container">

        @if (!is_null(auth()->user()->paciente))
            <div class="row">
                <h2>Consultas Marcadas: </h2>
            </div>
            @if (!is_null(auth()->user()->paciente->consultas))

                @foreach(auth()->user()->paciente->consultas as $consulta)
                    <p>
                        Consulta Marcada para: {{$consulta->data_consulta}} -
                        @if (date('Y-m-d', strtotime($consulta->data_consulta)) == date('Y-m-d'))
                            <strong>
                                <a href="{{route('atendimento.show', $consulta->id)}}">
                                    Clique aqui, para entrar na sala da consulta!
                                </a>
                            </strong>
                        @endif
                    </p>
                @endforeach
            @else
                <strong>Não possui consultas marcadas!</strong>
            @endif
        @else
            <div class="row">
                <h2>Bem Vindo, {{auth()->user()->nome . ' ' . auth()->user()->sobrenome}} </h2>
            </div>

            <div class="row">
                <h5>Consultas agendadas para {{date('d-m-Y')}}: </h5>
            </div>

            <div class="row">
                @if (!is_null(auth()->user()->doutor->consultas))
                    @foreach(auth()->user()->doutor->consultas as $consulta)
                        @if (date('Y-m-d', strtotime($consulta->data_consulta)) == date('Y-m-d'))
                            <p>
                                Consulta:
                                <strong>
                                    <a href="{{route('atendimento.show', $consulta->id)}}">
                                        Clique aqui, para entrar na sala e encontrar o paciente!
                                    </a>
                                </strong>
                            </p>
                        @endif
                    @endforeach
                @else
                    <strong>Não possui consultas marcadas para hoje!</strong>
                @endif
            </div>
        @endif
    </div>
@endsection
