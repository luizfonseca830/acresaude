@extends('layouts.dashboard.app')

@section('card')
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($especialidades as $especialidade)
                <tr>
                    <td>{{$especialidade->especialidade}}</td>
                    <td>{{$especialidade->descricao}}</td>
                    <td>Construção</td>
                </tr>
            @endforeach
            </tbody>

            <tfoot>
            <tr>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Ações</th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
