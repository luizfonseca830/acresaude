@extends('layouts.weelcome.app')
@section('link-css')
    <link rel="stylesheet" href="{{asset('css/welcome/impletamentations.css')}}">
@endsection

@section('content')
        <section class="banner_part">
            <section class="clean-block clean-hero"
                     style="background-image:url({{asset('images/teleconsulta.jpg')}});color:rgba(9, 162, 255, 0.85);">
                <div class="text">
                    <h2>Com o Acre Saúde você não precisa sair de casa para receber um atendimento médico.</h2>
                    <p>Nosso Atendimento é seguro, legalizado, com qualidade e preço justo.</p>
                    <button class="btn btn-outline-light btn-lg" type="button"
                            onclick="window.location='{{route("consulta.index")}}'">
                        Agende
                    </button>
                </div>
            </section>
            <section class="clean-block clean-info dark">
                <div class="container">
                    <div class="block-heading">
                        <h2 class="text-info">INFORMAÇÕES</h2>
                        <p>Aceitamos pagamentos somente em cartão de crédito, parcelamentos até 3 vezes.</p>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="getting-started-info"></div>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <section class="clean-block features">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Especialidades</h2>
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
                <div class="row justify-content-center" style="padding: 15px">
                    <a href="{{route('consulta.index')}}"><input type="button" class="btn btn-outline-primary"
                                                                 value="Mais Especialidades"></a>
                </div>
            </div>
        </section>

        <section class="clean-block clean-info dark">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-xl-5">
                        <div class="banner_text">
                            <div class="banner_text_iner">
                                <h1>Trabalhe
                                    Conosco</h1>
                                <p>Tenha o consultorio na palma da mão </p>
                                <a href="{{route('solicitacao.index')}}"><input type="button"
                                                                                class="btn btn-outline-primary"
                                                                                value="Faça sua solicitação"/></a>
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
        <section class="clean-block">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Sobre nós</h2>
                    <h7>
                        <p> O Acre Saúde conta com excelentes profissionais, que atendem seus pacientes com respeito,
                            ética
                            e a
                            atenção que merecem.</p>

                        <br>
                        <p> Somos uma empresa especializada em Telemedicina,
                            Consulta Domiciliar e Teleorientação Médica.</p>

                        <br>
                        <p> Nossa empresa atua por telemedicina (consulta online), ou com serviço presencial, que é
                            aquele
                            que
                            vai ao encontro do cliente,
                            disponibilizando um especialista para atende-lo em domicílio, ou onde desejar.</p>

                    </h7>
                </div>
            <!--                        <div class="row justify-content-center">
                            <div class="col-sm-6 col-lg-4">
                                <div class="card text-center clean-card"><img class="card-img-top w-100 d-block"
                                                                              src="{{asset('images/avatars/avatar1.jpg')}}">
                                    <div class="card-body info">
                                        <h4 class="card-title">Dr. Jon</h4>
                                        <p class="card-text">Nutricionista</p>
                                        <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i
                                                    class="icon-social-instagram"></i></a><a href="#"><i
                                                    class="icon-social-twitter"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card text-center clean-card"><img class="card-img-top w-100 d-block"
                                                                              src="{{asset('images/avatars/avatar2.jpg')}}">
                                    <div class="card-body info">
                                        <h4 class="card-title">Dr. Enoque</h4>
                                        <p class="card-text">Clinico Geral</p>
                                        <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i
                                                    class="icon-social-instagram"></i></a><a href="#"><i
                                                    class="icon-social-twitter"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card text-center clean-card"><img class="card-img-top w-100 d-block"
                                                                              src="{{asset('images/avatars/avatar3.jpg')}}">
                                    <div class="card-body info">
                                        <h4 class="card-title">Dra. Ally Sanders</h4>
                                        <p class="card-text">Psicóloga</p>
                                        <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i
                                                    class="icon-social-instagram"></i></a><a href="#"><i
                                                    class="icon-social-twitter"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
            </div>
        </section>
@endsection

@section('link-scirpt')
    <script src="{{asset('assets/alertifyjs/alertify.min.js')}}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    @include('notifications.notification')
@endsection
