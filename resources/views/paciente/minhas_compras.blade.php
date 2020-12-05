@extends('layouts.weelcome.app')
@section('link-css')
    <link rel="stylesheet" href="{{asset('css/loja/style.css')}}">
@endsection
@section('content')
    <div class="container ajuste">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pacote</th>
                <th scope="col">Dia Realizado</th>
                <th scope="col">Staus</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($compras as $compra)
                <tr>
                    <th>{{$compra->id}}</th>
                    <th>Consulta</th>
                    <th>{{$compra->created_at}}</th>
                    @if($compra->status == 0)
                        <th class="text-warning font-weight-bold">Pendente</th>
                    @elseif($compra->status == 1)
                        <th class="text-success font-weight-bold">Pago</th>
                    @else
                        <th class="text-danger font-weight-bold">Recusado</th>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        @if(count($compras) == 0)
            <p class="text-info font-weight-bold text-center">Nenhuma Compra realizada!</p>
        @endif
    </div>
@endsection
