@extends('layouts.weelcome.app')
@section('link-css')
    <link rel="stylesheet" href="{{asset('css/loja/style.css')}}">
@endsection

@section('content')
    <div class="container ajuste">
        <h2>Marque sua Consulta</h2>
        <hr>
        <div class="row justify-content-center">
            <form method="post" action="{{route('paciente.maracaConsulta', $compra_id)}}">
                @csrf

                @if(session()->has('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    {{session()->forget('error')}}
                @endif

                <div class="form-group">
                    <h4 for="selectMedico">Medico - Especilidade</h4>
                    <select class="form-control" id="selectMedico">
                        <option value="">Não Selecionado</option>
                        @foreach($medicos as $medico)
                            <option value="{{$medico->id}}">{{$medico->pessoa->nome}} - {{$medico->especialide->nome}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <h4 for="selectAgenda">Data e Hora de Consultas Disponível</h4>
                    <select class="form-control" name="agenda_id" id="selectAgenda">
                        <option value="">Não Selecionado</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="text-info">Após clica em confirma essas consulta não podera ser alterada, sem entrar em contato com suporte.</label>
                </div>

                <div class="form-group text-right">
                    <input type="submit" class="btn btn-outline-primary" value="Confirma">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('link-scirpt')
    <script src="{{asset('assets/jquery/momenet.js')}}"></script>
    <script src="{{asset('js/paciente/agenda_consulta_busca.js')}}"></script>
@endsection
