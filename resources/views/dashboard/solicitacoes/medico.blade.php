@extends('layouts.dashboard.app')
@section('link-css')
    <link rel="stylesheet" href="{{asset('css/dashboard/solicitacao/medico.css')}}">
@endsection
@section('card')
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Especialidade</th>
                <th>RG</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($solicitacoes as $solicitacao)
                <tr>
                    <td>{{$solicitacao->pessoa->nome}}</td>
                    <td>{{$solicitacao->especialidade->especialidade}}</td>
                    <td>{{$solicitacao->rg}}</td>
                    <td>
                        <div class="row">
                            <div class="col col-2">
                                <a href="{{route('solicitacao.medico.visualizar.dashboard', $solicitacao->id)}}">
                                    <i class="pe-7s-info icons-acao"></i>
                                </a>
                            </div>

{{--                            <div class="col col-2">--}}
{{--                                <a href="{{route('solicitacao.medico.aceitar.dashboard', $solicitacao->id)}}">--}}
{{--                                    <i class="pe-7s-like2 icons-acao"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}

{{--                            <div class="col col-2">--}}
{{--                                <a href="#">--}}
{{--                                    <i class="pe-7s-close-circle icons-close"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>

            <tfoot>
            <tr>
                <th>Nome</th>
                <th>Especialidade</th>
                <th>RG</th>
                <th>Ações</th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
