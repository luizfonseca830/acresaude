@extends('layouts.weelcome.app')
@section('link-css')
    <link rel="stylesheet" href="{{asset('css/welcome/impletamentations.css')}}">
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit sed do eiusmod tempor incididunt ut labore et dolore
                                magna aliqua. Quis ipsum suspendisse ultrices gravida.Risus cmodo viverra </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner_img">
                        <img src="{{asset('images/weelcome/banner_img.png')}}" alt=""
                             data-pagespeed-url-hash="2749540510"
                             onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="especialidade">
        <div class="container">
            <div class="row justify-content-center col-12">
                <div class="page-title-wrapper">
                    <h2 style="margin-top: 10px">Especidades</h2>
                </div>
            </div>
            <div class="row">
                @foreach($especialidades as $especialidade)

                    <div class="col-sm-6">
                        <a href="#">
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
        </div>
    </section>
@endsection
