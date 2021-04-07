@extends('layouts.dashboard.app')

@section('container')
    <form method="post" action="{{route('especialidade.update.dashboard', $especialidade->id)}}">
        @csrf
        <div class="form-group">
            <label for="especialidade">Nome da Especialidade</label>
            <input type="text" class="form-control" id="especialidade" name="especialidade"
                   value="{{$especialidade->especialidade}}" required>
            @error('especialidade')
            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao"
                      value="{{$especialidade->descricao}}">
        </div>
        <input type="submit" class="btn btn-primary" value="Editar">
        <button class="btn btn-primary" href="{{route('especialidade.list.dashboard')}}" type="button">Sair</button>
    </form>
@endsection
