@extends('layouts.dashboard.app')
@section('container')
    <form method="post" action="{{route('usuario.update.dashboard', $usuario->id)}}">
        @csrf
        <div class="form-group">
            <label for="usuario">Usuário</label>
            <input type="text" class="form-control" id="usuario" name="usuario"
                  value="{{$usuario->usuario}}" disabled>
        </div>
        <div class="form-group">
            <label for="usuario">Nome</label>
            <input type="text" class="form-control" id="usuario" name="usuario"
                   value="{{$usuario->pessoa->nome}}" disabled>
        </div>

        <div class="form-group">
            <label for="email">Endereço de Email</label>
            <input type="email" class="form-control" id="email" name="email"
                   value="{{$usuario->email}}" required>
        </div>
        @error('email')
        <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <input type="submit" class="btn btn-outline-primary btn-lg float-right" value="Editar">
    </form>
@endsection
