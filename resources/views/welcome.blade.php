@extends('layouts.weelcome.app')
@section('link-css')
    <link rel="stylesheet" href="{{asset('css/welcome/impletamentations.css')}}">
    <link rel="stylesheet" href="{{asset('assets/alertifyjs/css/alertify.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/alertifyjs/css/alertify.rtl.min.css')}}">
@endsection

@section('content')
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-xl-5">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>Agende
                                Sua Consulta</h1>
                            <p>Nossas consultas são a distância</p>
                            <p>Tendo em vista a situação atual.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner_img">
                        <img src="{{asset('images/weelcome/banner_img.png')}}" alt=""
                             data-pagespeed-url-hash="2749540510">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="especialidade">
        <div class="container">
            <div class="row justify-content-center col-12">
                <div class="page-title-wrapper">
                    <h2 style="margin-top: 10px">Especialidades</h2>
                </div>
            </div>
            <div class="row">
                @foreach($especialidades as $especialidade)
                    <div class="col-sm-6">
                        <a href="{{route('consulta.mostra', $especialidade->id)}}">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{$especialidade->especialidade}}</h5>
                                    <p class="card-text">{{$especialidade->descricao}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <a href="{{route('consulta.index')}}"><input type="button" class="btn btn-outline-primary" value="Mais Especialidades"></a>
            </div>
        </div>
    </section>

    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-xl-5">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>Trabalhe
                                Conosco</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit sed do eiusmod tempor incididunt ut labore et dolore
                                magna aliqua. Quis ipsum suspendisse ultrices gravida.Risus cmodo viverra </p>
                            <a href="{{route('solicitacao.index')}}"><input type="button" class="btn btn-outline-primary float-right" value="Faça sua solicitação"/></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner_img">
                        <img src="{{asset('images/weelcome/medico.png')}}" alt=""
                             data-pagespeed-url-hash="2749540510">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('link-scirpt')
    <script src="{{asset('assets/alertifyjs/alertify.min.js')}}"></script>
    @include('notifications.notification')
@endsection
