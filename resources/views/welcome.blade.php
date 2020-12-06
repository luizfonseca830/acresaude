@extends('layouts.weelcome.app')

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

                            <a href="{{route('loja.index')}}" class="float-right float-lg-right float-md-right"><input type="button" class="btn btn-outline-primary btn-lg font-weight-bolder" value="Comprar"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner_img">
                        <img src="{{asset('images/weelcome/banner_img.png')}}" alt="" data-pagespeed-url-hash="2749540510" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
