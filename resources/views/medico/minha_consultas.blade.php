@extends('layouts.weelcome.app')
@section('link-css')
    <link rel="stylesheet" href="{{asset('css/loja/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/DataTables/datatables.min.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="title">
                <hr>
                <h2>{{$agenda->medicoEspecialidade->especialidade->especialidade}}</h2>
                <hr>
            </div>
            <table id="consultas" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Data Consulta</th>
                    <th>Tempo de Consulta</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($agenda->agendaConsulta as $consulta)
                    <tr>
                        <td>{{$consulta->id}}</td>
                        <td>{{$consulta->data_consulta}}</td>
                        <td>{{$agenda->intervalo}}</td>
                        <td class="text-center">
                            <a href="{{route('medico.consulta.delete.unico', $consulta->id)}}"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Data Consulta</th>
                    <th>Tempo de Consulta</th>
                    <th>Ações</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('link-scirpt')
    <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/DataTables/datatables.min.js')}}"></script>
    <script src="{{asset('js/medico/consultas.js')}}"></script>
@endsection
