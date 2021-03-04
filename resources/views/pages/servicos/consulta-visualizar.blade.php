@extends('layouts.weelcome.app')

@section('link-css')
    <link rel="stylesheet" href="{{asset('css/servico/consulta-visualizacao.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Icon-font-7-stroke/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Icon-font-7-stroke/pe-icon-7-stroke/css/helper.css')}}">
@endsection

@section('container')
    <section class="fundo">
        <div class="container">
            <div class="row">
                <div class="col col-6">
                    <div class="title text-center">
                        <hr>
                        <h4 class="font-weight-bold">INSTRUÇÕES</h4>
                        <hr>
                    </div>
                    <p>
                        Consulta pagas com cartão de credito tera sua horas confirmada mediante a validação do pagamento
                        caso seja por boleto não se poderar garantir o agendamento na hora desejada devido o atraso
                        de <b>3 dias na validação</b> no pagamento do mesmo.
                    </p>
                </div>
                <div class="col col-6 fundo-2-col">
                    <div class="title text-center">
                        <hr>
                        <h4 class="font-weight-bold">ESCOLHA O HORÁRIO DA CONSULTA</h4>
                        <hr>
                    </div>
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
                        <div class="form-group">
                            <label for="medico">Médico</label>
                            <select class="form-control" id="medico">
                                <option value="">Não Selecionado</option>
                                @foreach($especialidade->medicoEspecialidade as $medicoEsp)
                                    <option
                                            value="{{$medicoEsp->medico->id}}">{{$medicoEsp->medico->pessoa->nome}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="horario">Horários Disponíveis </label>
                            <select class="form-control" id="horario" name="agenda_id" disabled>
                                <option value="">Não Selecionado</option>
                            </select>
                        </div>

                        <div class="form-group float-right" id="processando" hidden>
                            <label>Processando Pagamento. Aguarde.</label>
                            <div class="spinner-border text-warning" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                <a href="#">Lê e Concordo com os Termos de Compra.</a>
                            </label>
                        </div>

                        <div class="form-group float-right">
                            {{--                            <input type="text" id="rota_pagamento" value="{{route('consulta.pagamento')}}" hidden>--}}
                            {{--                            <input type="text" id="rota_minha_compras" value="{{route('minhascompras.index')}}" hidden/>--}}
                            <input type="button" class="btn btn-outline-primary" value="Confirmar Pagamento"
                                   id="confirma_pagamento" hidden/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="modal-confirm-pagament">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{route('pagamento.transação')}}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">CONFIRMAÇÃO DE PAGAMENTO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text">
                        <h3>Você deseja confirma o pagamento ?</h3>
                        <input type="text" value="" name="dataToken" id="dataToken" hidden/>
                        <input type="text" value="" name="idLoja" id="idShop" hidden/>
                        <input type="text" value="" name="price" id="dataPrice" hidden/>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-outline-success" value="Confirma Pagamento">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modal-login">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Você não está logado!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_login">
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

@endsection

@section('link-scirpt')
    <script src="{{asset('assets/jquery/momenet.js')}}"></script>
    <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/consultas/consultas.js')}}"></script>
    <script src="https://assets.pagar.me/checkout/1.1.0/checkout.js"></script>
@endsection
