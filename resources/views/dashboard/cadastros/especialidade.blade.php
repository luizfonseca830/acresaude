@extends('layouts.dashboard.app')

@section('container')
    <form method="post" action="{{route('especialidade.store.dashboard')}}">
        @csrf
        <div class="form-group">
            <label for="especialidade">Nome da Especialidade</label>
            <input type="text" class="form-control" id="especialidade" name="especialidade" placeholder="Nome da especialidade">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Descrição</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricao"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Cadastrar">
    </form>
@endsection
