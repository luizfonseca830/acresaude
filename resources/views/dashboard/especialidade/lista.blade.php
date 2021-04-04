@extends('layouts.dashboard.app')
@section('link-css')
    <link rel="stylesheet" href="{{asset('assets/alertifyjs/css/alertify.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/alertifyjs/css/alertify.rtl.min.css')}}">
@endsection

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
                    <td>
                        <a href="#"><i class="fa fa-search" style="color: green"></i></a>
                        <a href="{{route('especialidade.edit.dashboard', $especialidade->id)}}"><i class="fa fa-pen" style="color: #2180e8"></i></a>
                        <a href="{{route('especialidade.destroy.dashboard', $especialidade->id)}}"><i class="fa fa-trash" style="color: red"></i></a>
                    </td>
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

@section('link-scirpt')
    <script src="{{asset('assets/alertifyjs/alertify.min.js')}}"></script>
    @include('notifications.notification')
@endsection

