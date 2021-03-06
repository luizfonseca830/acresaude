<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Acre Saude</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{asset('css/welcome/menu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/alertifyjs/css/alertify.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/alertifyjs/css/alertify.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    @yield('link-css')
</head>
<body>
<div id="app">
    <main class="">
        @include('layouts.weelcome.menu')
        @yield('content')
    </main>
</div>
<div style="margin-top: 30px"></div>
@yield('container')
<div style="margin-bottom: 500px"></div>
<footer class="page-footer dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h5>Iniciar</h5>
                <ul>
                    <li><a href="{{ route('inicio') }}">Inicio</a></li>
                    <li><a href="{{ route('login') }}">Logar</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Sobre nós</h5>
                <ul>
                    <li><a href="#">Informações da empresa</a></li>
                    <li><a href="#">Contatos</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Suporte</h5>
                <ul>
                    <li></li>
                    <li><a href="#">Ajuda</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Legal</h5>
                <ul>
                    <li><a href="#">Termos de Usuário</a></li>
                    <li></li>
                    <li><a href="#">Política de Privacidade</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <p>©2021 ACRE SAÚDE LTDA CNPJ:10.834.104/0001-55
        <br>RESPONSÁVEL TÉCNICO MÉDICO: DR. ENOQUE PEREIRA DE ARAÚJO - CRM/AC 772
        </p>
    </div>
</footer>
</body>
@yield('link-scirpt')
<script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/alertifyjs/alertify.min.js')}}"></script>
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>

@include('notifications.notification')
</html>
