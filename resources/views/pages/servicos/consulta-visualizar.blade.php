@extends('layouts.weelcome.app')

@section('link-css')
    <link rel="stylesheet" href="{{asset('css/servico/consulta-visualizacao.css')}}">
    <link rel="stylesheet" href="{{asset('css/servico/consulta-base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Icon-font-7-stroke/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Icon-font-7-stroke/pe-icon-7-stroke/css/helper.css')}}">
    <style>
        ul li:nth-child(n+11) {
            display: none;
        }

        span {
            cursor: pointer;
            color: #f00;
        }
    </style>
@endsection

@section('container')
    <form action="#" method="post">
        @csrf
        <input type="text" value="{{$especialidade->id}}" id="especialidade_id" hidden>
        <input type="text" value="{{route('consulta.ajax.searchMedicoHorario')}}" id="rota_busca"
               hidden/>
        <input type="text" value="{{env('api_key_pagarme_encryption')}}" id="api_key_encryption"
               hidden/>
        <input type="text" value="{{route('consulta.price')}}" id="route_price" hidden/>
        <input type="text" value="{{route('login')}}" id="route_login_acess" hidden/>
        <input type="text" value="{{auth()->check()}}" id="logado" hidden/>
        @foreach($especialidade->medicoEspecialidade as $medicoEsp)
            @if (!is_null($medicoEsp->agendaCosultaMaisProxima()))
                <div class="container-fluid">
                    <section class="step-two__region">
                        <header class="step-two__sub-header">
                            <h5 class="blue step-two__sub-title">
                                <time>{{$medicoEsp->converteData(date($medicoEsp->agendaCosultaMaisProxima()->first()->data_consulta))}}</time>
                            </h5>
                        </header>

                        <div class="drc-schedules-professional">
                            <div class="drc-schedules-professional-info" value="{{$medicoEsp->medico->id}}">
                                <div class="drc-professional-image drc-fem">
                                    <img src="{{asset('images/img-equipe-man.svg')}}" alt="-">
                                </div>
                                <h6 class="blue">{{$medicoEsp->medico->pessoa->nome}}</h6>
                                <p class="drc-legend">
                                    <span>{{$medicoEsp->medico->conselho}}: {{$medicoEsp->medico->num_conselho}}</span>
                                </p>
                            </div>
                            <ul id="datalist">
                                @foreach($medicoEsp->agendaCosultaMaisProxima() as $agendaConsulta)
                                    <li>
                                        <button type="button" class="nb_btn nb_btn--green nb_btn--block"
                                                id="confirma_pagamento" data-time="{{$agendaConsulta->id}}">
                                            <time>{{date_format(date_create($agendaConsulta->data_consulta), 'H:i')}}</time>
                                        </button>
                                    </li>
                                @endforeach
                                <span type="button" class="nb_btn nb_btn--green nb_btn--block">Mostrar Mais</span>
                            </ul>
                        </div>
                    </section>
                </div>
            @endif
        @endforeach
    </form>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-login">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Você não está logado!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            id="close_login">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text">
                    <h6>Você precisa está logado ou se cadastrar para realizar uma consulta em nosso site.</h6>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-outline-success" id="confirm_login" value="Confirmar">
                </div>
            </div>
        </div>
    </div>

    </section>
@endsection

@section('link-scirpt')
    <script src="{{asset('assets/jquery/momenet.js')}}"></script>
    <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
    <script src="https://assets.pagar.me/checkout/1.1.0/checkout.js"></script>
    <script src="{{asset('js/consultas/consultas.js')}}"></script>
    <script>
        $(function () {
            $('span').click(function () {
                $('#datalist li:hidden').slice(0, 5).show();
                if ($('#datalist li').length == $('#datalist li:visible').length) {
                    $('span ').hide();
                }
            });

            // $('#confirma_pagamento[data-time]').click(function (){
            // })
        });
    </script>
@endsection
