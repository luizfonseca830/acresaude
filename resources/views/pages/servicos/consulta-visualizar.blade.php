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
                        <input type="text" value="{{route('consulta.ajax.searchMedicoHorario')}}" id="rota_busca" hidden/>
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

                        <div class="form-group float-right">
{{--                            <input type="text" id="rota_pagamento" value="{{route('consulta.pagamento')}}" hidden>--}}
{{--                            <input type="text" id="rota_minha_compras" value="{{route('minhascompras.index')}}" hidden/>--}}
                            <input type="button" class="btn btn-outline-primary" value="Confirmar Pagamento"
                                   id="confirma_pagamento" hidden />
                        </div>
                    </form>
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
        $('#confirma_pagamento').click(function () {
            var checkout = new PagarMeCheckout.Checkout({
                encryption_key: '{{env('API_KEY_PAGARME_ENCRYPTION')}}',
                success: function (data) {
                    console.log(data);
                },
                error: function (err) {
                    console.log(err);
                },
                close: function () {
                    console.log('The modal has been closed.');
                }
            })

            checkout.open({
                amount: 10000,
                customerData: 'true',
                createToken: 'true',
                paymentMethods: 'boleto,credit_card',
                boletoExpirationDate: "{{Date('Y-m-d', strtotime('+3 days'))}}",
                items: [{
                    id: 1, //NUMERO NA LOJA
                    title: 'Consulta - Online',
                    unit_price: 1500,
                    quantity: 1,
                    tangible: 'false'
                }]
            })
        })
    </script>
@endsection
