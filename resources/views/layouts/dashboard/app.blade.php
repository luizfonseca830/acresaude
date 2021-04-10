<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('css/dashboard/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Icon-font-7-stroke/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Icon-font-7-stroke/pe-icon-7-stroke/css/helper.css')}}">
    <link rel="stylesheet" href="{{asset('assets/alertifyjs/css/alertify.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/alertifyjs/css/alertify.rtl.min.css')}}">


    @yield('link-css')
    <title>DASHBOARD</title>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar closed-sidebar-mobile closed-sidebar">
    {{--    TOP MENU--}}
    @include('layouts.dashboard.menus.top-menu')
    <div class="app-main">
        {{--        LEFT MENU--}}
        @include('layouts.dashboard.menus.left-menu')

        <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div class="page-title-icon">
                                <i class="pe-7s-graph icon-gradient bg-ripe-malin"></i>
                            </div>
                            <div>Seja Bem Vindo, {{auth()->user()->pessoa->name . " " . auth()->user()->pessoa->sobrenome}}
                                <div class="page-title-subheading">Essa é a área administrativa</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-card mb-3 card">
                    <div class="row justify-content-center" id="carregando">
                        <img src="{{asset('/gifs/Spinner-0.5s-74px.gif')}}">
                    </div>
                    @yield('card')

                </div>

                <div class="tabs-animation">
                    <div class="row">
                        @yield('tabs')
                    </div>
                </div>

                <div class="container">
                    @yield('container')
                </div>
            </div>
        </div>
    </div>


</div>
</body>

@yield('link-scirpt')
<script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/alertifyjs/alertify.min.js')}}"></script>
<script src="{{asset('js/dashboard/app.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $("#carregando").css("display", "none");
    })
</script>
@include('notifications.notification')
</html>
