@extends('layouts.weelcome.app')
@section('link-css')
    <link rel="stylesheet" href="{{asset('css/loja/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/DataTables/datatables.min.css')}}">
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <table id="consultas" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Especialidade</th>
                    <th>Data Consulta</th>
                    <th>Tempo de Consulta</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($agendaMedico as $agenda)

                    @foreach($agenda->meusAtendimentos($agenda->id) as $atendimento)
                        <tr>
                            <td>{{$atendimento->id}}</td>
                            <td>{{$agenda->medicoEspecialidade->especialidade->especialidade}}</td>
                            <td>{{$atendimento->data_consulta}}</td>
                            <td>{{$agenda->intervalo}} Minutos</td>
                            <td class="text-center">
                                <a href="{{route('medico.consulta.delete.unico', $atendimento->id)}}"><i
                                            class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Especialidade</th>
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
