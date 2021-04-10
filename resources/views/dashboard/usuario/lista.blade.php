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
            @foreach($users as $usuario)
                <tr>
                    <td>{{$usuario->pessoa->nome}}</td>
                    <td>{{$usuario->pessoa->cpf}}</td>
                    <td>{{$usuario->pessoa->tipoUsuario->nome}}</td>
                    <td>
                        <a href="{{route('usuario.edit.dashboard', $usuario->id)}}"><i class="fa fa-pen"
                                                                                       style="color: blue"></i></a>
                        <a href="{{route('usuario.destroy.dashboard', $usuario->id)}}"><i class="fa fa-trash"
                                                                                          style="color: red"></i></a>

                    </td>
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
