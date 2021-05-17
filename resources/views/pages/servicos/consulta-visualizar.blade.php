@extends('layouts.weelcome.app')

@section('link-css')
    <link rel="stylesheet" href="{{asset('css/servico/consulta-visualizacao.css')}}">
    <link rel="stylesheet" href="{{asset('css/servico/consulta-base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Icon-font-7-stroke/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Icon-font-7-stroke/pe-icon-7-stroke/css/helper.css')}}">
    <style>
        ul li:nth-child(n+11) {
            display:none;
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
        <div class="container-fluid">

                <section class="step-two__region">
                    <header class="step-two__sub-header">
                        <h5 class="blue step-two__sub-title">
                            <time datetime="1619672400000">quinta-feira, 29 de abril</time>
                        </h5>
                    </header>

                    <div class="drc-schedules-professional">
                        <div class="drc-schedules-professional-info" value="{{$medicoEsp->medico->id}}">
                            <div class="drc-professional-image drc-fem">
                                <img src="{{asset('images/img-equipe-man.svg')}}" alt="-">
                            </div>
                            <h6 class="blue">{{$medicoEsp->medico->pessoa->nome}}</h6>
                            <p class="drc-legend">
                                <span>{{$medicoEsp->medico->conselho}}: {{$medicoEsp->medico->num_conselho}}</span></p>
                        </div>
                        <ul id="datalist">
                            @foreach($medicoEsp->agendaCosulta as $agendaConsulta)
{{--                                @dd($agendaConsulta->data_consulta)--}}
                            <li>
                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">
                                    <time datetime="1619703300000">{{date_format(date_create($agendaConsulta->data_consulta), 'H:i')}}</time>
                                </button>
                            </li>
                            @endforeach
                                <span type="button" class="nb_btn nb_btn--green nb_btn--block">Mostrar Mais</span>
                        </ul>
                    </div>
                </section>
        </div>
        @endforeach
{{--        <div class="container-fluid">--}}
{{--            @foreach($especialidade->medicoEspecialidade as $medicoEsp)--}}
{{--                <section class="step-two__region">--}}
{{--                    <header class="step-two__sub-header">--}}
{{--                        <h5 class="blue step-two__sub-title">--}}
{{--                            <time datetime="1619672400000">sexta-feira, 29 de abril</time>--}}
{{--                        </h5>--}}
{{--                    </header>--}}

{{--                    <div class="drc-schedules-professional">--}}
{{--                        <div class="drc-schedules-professional-info" value="{{$medicoEsp->medico->id}}">--}}
{{--                            <div class="drc-professional-image drc-fem"><img--}}
{{--                                    src="https://s2pics.s3.amazonaws.com/profissionais/fotos/100312_s.jpg" alt="-">--}}
{{--                            </div>--}}
{{--                            <h6 class="blue">{{$medicoEsp->medico->pessoa->nome}}</h6>--}}
{{--                            <p class="drc-legend">--}}
{{--                                <span>{{$medicoEsp->medico->conselho}}: {{$medicoEsp->medico->num_conselho}}</span></p>--}}
{{--                        </div>--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619703300000">08:35</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619704200000">08:50</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619706300000">09:25</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </section>--}}

{{--                <section class="step-two__region">--}}
{{--                    <div class="drc-schedules-professional">--}}
{{--                        <div class="drc-schedules-professional-info">--}}
{{--                            <div class="drc-professional-image drc-fem"><img--}}
{{--                                    src="https://s2pics.s3.amazonaws.com/profissionais/fotos/103143_s.jpg" alt="-">--}}
{{--                            </div>--}}
{{--                            <h6 class="blue">Mirela Andrea Rosenberg Ward</h6>--}}
{{--                            <p class="drc-legend"><span>CRM-AC 182658</span></p></div>--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619705700000">09:15</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619707500000">09:45</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619709300000">10:15</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619710200000">10:30</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619714700000">11:45</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619715600000">12:00</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </section>--}}
{{--                <section class="step-two__region">--}}
{{--                    <div class="drc-schedules-professional">--}}
{{--                        <div class="drc-schedules-professional-info">--}}
{{--                            <div class="drc-professional-image drc-fem"></div>--}}
{{--                            <h6 class="blue">Erika Felix Andrade</h6>--}}
{{--                            <p class="drc-legend"><span>CRM-AC 180622</span></p></div>--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619714100000">11:35</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619715000000">11:50</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619715600000">12:00</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619716200000">12:10</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619717100000">12:25</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619717700000">12:35</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619718600000">12:50</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619719200000">13:00</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619719800000">13:10</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619720700000">13:25</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619721300000">13:35</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619722200000">13:50</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619722800000">14:00</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619723400000">14:10</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619724300000">14:25</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619724900000">14:35</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619725800000">14:50</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619726400000">15:00</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619727000000">15:10</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619727900000">15:25</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619728500000">15:35</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="nb_btn nb_btn--green nb_btn--block">--}}
{{--                                    <time datetime="1619729400000">15:50</time>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </section>--}}
{{--            @endforeach--}}
{{--        </div>--}}
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
    <script src="{{asset('js/consultas/consultas.js')}}"></script>
    <script src="https://assets.pagar.me/checkout/1.1.0/checkout.js"></script>
    <script>
        $(function () {
            $('span').click(function () {
                $('#datalist li:hidden').slice(0, 5).show();
                if ($('#datalist li').length == $('#datalist li:visible').length) {
                    $('span ').hide();
                }
            });
        });
    </script>
@endsection
