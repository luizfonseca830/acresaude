@extends('layouts.dashboard.app')
@section('container')
    <form method="post" action="{{route('usuario.update.dashboard', $usuario->id)}}">
        @csrf
        <div class="form-group">
            <label for="usuario">Digite seu Usuário</label>
            <input type="text" class="form-control" id="usuario" name="usuario"
                  value="{{$usuario->usuario}}" required>
            @error('usuario')
            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Endereço de Email</label>
            <input type="email" class="form-control" id="email" name="email"
                   value="{{$usuario->email}}" required>
        </div>
        @error('email')
        <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
        <div class="form-group">
            <label for="password">Digite sua Senha</label>
            <input type="password" class="form-control" id="password" name="password"
                   placeholder="Digite sua senha">
        </div>
        @error('password')
        <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
        <div class="form-group">
            <label for="confirm-password">Confirma sua Senha</label>
            <input type="password" class="form-control" id="confirm-password" name="confirm_passowrd"
                   placeholder="Confirme sua senha">
        </div>
        @error('confirm_passowrd')
        <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <input type="submit" class="btn btn-outline-primary btn-lg float-right" value="Editar">
        <button class="btn btn-primary" href="{{route('usuario.lista.dashboard')}}" type="button">Sair</button>
    </form>
@endsection
