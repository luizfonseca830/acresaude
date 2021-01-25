@extends('layouts.weelcome.app')

@section('link-css')
    <link rel="stylesheet" href="{{asset('css/servico/consultas.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Icon-font-7-stroke/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Icon-font-7-stroke/pe-icon-7-stroke/css/helper.css')}}">
@endsection

@section('container')
    <section class="busca-consulta">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col col-12">
                    <h2 class="text-center">Marque suas Consultas.</h2>
                </div>
                <div class="input-group md-form form-sm form-1 pl-0">
                    @csrf
                    <input class="form-control my-0 py-1" type="text" id="espe"
                           placeholder="Digite aqui uma especialidade"
                           aria-label="Search">
                    <input type="text" id="rota" value="{{route('consulta.ajax.search')}}" style="display: none"/>
                </div>
            </div>
        </div>
    </section>

    <section class="especialidade">
        <div class="row">

            <div class="container" id="container">
                <h4>Especialides Online</h4>

                @foreach($especialidades as $especialidade)
                    <div class="card" id="card">
                        <div class="card-body" id="card-body">
                            <div class="row justify-content-center align-content-lg-center -align-center">
                                <div class="col col-3">
                                    <h6 style="font-weight: bold">{{$especialidade->especialidade}}</h6>
                                </div>
                                <div class="col col-9">
                                    <div class="text-right">
                                        <i class="pe-7s-signal"></i>
                                        <input type="button" class="btn btn-primary" value="Agendar">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('link-scirpt')
    <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/consultas/consultas.js')}}"></script>
@endsection
