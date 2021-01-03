@extends('layouts.dashboard.app')

@section('card')
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Tipo de Usuário</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->pessoa->nome}}</td>
                    <td>{{$usuario->pessoa->cpf}}</td>
                    <td>{{$usuario->pessoa->tipoUsuario->nome}}</td>
                    <td>Construção</td>
                </tr>
            @endforeach
            </tbody>

            <tfoot>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Tipo de Usuário</th>
                <th>Ações</th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
