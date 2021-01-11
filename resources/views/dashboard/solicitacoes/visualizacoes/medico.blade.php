@extends('layouts.dashboard.app')
@section('link-css')
    <link rel="stylesheet" href="{{asset('css/dashboard/solicitacao/medico.css')}}">
@endsection
@section('container')
    <h4>Informações sobre o conselho</h4>
    <div class="form-group">
        <label for="conselho">Conselho: </label>
        <input type="text" class="form-control" value="{{$solicatacao->conselho}}" disabled>
    </div>

    <div class="form-group">
        <label for="num_conselho">Número do Conselho: </label>
        <input type="text" class="form-control" id="num_conselho" value="{{$solicatacao->num_conselho}}" disabled>
    </div>

    <div class="form-group">
        <label for="rqe">RQE:</label>
        <input type="text" class="form-control" id="rqe" value="{{$solicatacao->rqe}}" disabled>
    </div>


    <hr>

    <h4>Dados Pessoais - Complementares</h4>
    <div class="form-group">
        <labe for="rg">RG</labe>
        <input type="text" class="form-control" id="rg" value="{{$solicatacao->rg}}" disabled>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group mb-2">
                <label for="telefone">Telefone: </label>
                <input type="text" class="form-control" id="telefone" value="{{$solicatacao->telefone}}" disabled>
            </div>
        </div>
        <div class="col col-6">
            <div class="form-group mb-2">
                <label for="celular">Telefone Celular: </label>
                <input type="text" class="form-control" id="celular" value="{{$solicatacao->celular}}" disabled>
            </div>
        </div>
    </div>
    <hr>
    <h4>Procedimentos</h4>
    <div class="form-group">
        <label for="procedimento">Procedimentos de Exames/Consultas</label>
        <textarea class="form-control" id="procedimento" rows="3" disabled>{{$solicatacao->procedimento}}</textarea>
    </div>
    <hr>

    <div class="form-group">
        <a href="{{route('solicitacao.medico.aceitar.dashboard', $solicatacao->id)}}"><input type="button" class="btn btn-outline-success btn-lg btn-block" value="Aceitar"/></a>
    </div>
    <div class="form-group">
        <a href="{{route('solicitacao.medico.rejeitar.dashboard', $solicatacao->id)}}"><input type="button" class="btn btn-outline-danger btn-lg btn-block" value="Recusar"/></a>
    </div>
@endsection
