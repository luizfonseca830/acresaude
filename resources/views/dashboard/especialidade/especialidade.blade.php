@extends('layouts.dashboard.app')

@section('container')
    <form method="post" action="{{route('especialidade.store.dashboard')}}">
        @csrf
        <div class="form-group">
            <label for="especialidade">Nome da Especialidade</label>
            <input type="text" class="form-control" id="especialidade" name="especialidade"
                   placeholder="Nome da especialidade" value="{{old('especialidade')}}" required>
            @error('especialidade')
            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input class="form-control" id="descricao" rows="3" name="descricao">
            @error('descricao')
            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary" value="Editar">
    </form>
@endsection
