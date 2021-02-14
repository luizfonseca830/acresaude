@extends('layouts.weelcome.app')

@section('link-css')
    <link rel="stylesheet" href="{{asset('css/servico/consulta-visualizacao.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Icon-font-7-stroke/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Icon-font-7-stroke/pe-icon-7-stroke/css/helper.css')}}">
@endsection

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Produto</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Consulta</h6>
                            <small class="text-muted">Horário: {{$agenda->data_consulta}}</small>
                        </div>
                        <span class="text-muted">R${{$agenda->agendaMedico->preco}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (BRL)</span>
                        <strong>R${{$agenda->agendaMedico->preco}}</strong>
                    </li>
                </ul>

                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Código promocional">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Resgatar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Informações de Pagamento</h4>
                <form class="needs-validation" method="post" action="{{route('realizar.pagamento')}}" novalidate>
                    @csrf
                    <input type="text" value="{{$agenda->id}}" name="produto_id" hidden>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="primeiroNome">Nome</label>
                            <input type="text" class="form-control" id="primeiroNome" name="primeiroNome"
                                   placeholder="Fulano" value="{{auth()->user()->pessoa->nome}}" required>
                            <div class="invalid-feedback">
                                É obrigatório inserir um nome válido.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" class="form-control" id="sobrenome" name="sobrenome"
                                   placeholder="{{auth()->user()->pessoa->nome}}" value="" required>
                            <div class="invalid-feedback">
                                É obrigatório inserir um sobre nome válido.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="celular">Celular</label>
                        <input type="text" class="form-control" id="celular" name="celular"
                               placeholder="(99) 99999-9999" required>
                        <div class="invalid-feedback">
                            Por favor, insira um endereço de e-mail válido, para atualizações de entrega.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="{{auth()->user()->email}}" placeholder="fulano@exemplo.com">
                        <div class="invalid-feedback">
                            Por favor, insira um endereço de e-mail válido, para atualizações de entrega.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="cep">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep" placeholder="Informe o cep"
                               required>
                        <div class="invalid-feedback">
                            É obrigatório inserir um CEP.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco"
                               placeholder="Rua dos bobos, nº 0"
                               required>
                        <div class="invalid-feedback">
                            Por favor, insira seu endereço de entrega.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="endereco2">Endereço 2 <span class="text-muted">(Opcional)</span></label>
                        <input type="text" class="form-control" id="endereco2" name="endereco2"
                               placeholder="Apartamento ou casa">
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="estado">UF</label>
                            <input type="text" class="form-control" id="estado" name="estado" disabled required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="municipio">Municipio</label>
                            <input type="text" class="form-control" id="municipio" name="municipio" disabled required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="numero">Número</label>
                            <input type="text" class="form-control" id="numero" name="numero" required>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="salvar_info" id="salvar-info">
                        <label class="custom-control-label" for="salvar-info">Lembrar desta informação, na próxima
                            vez.</label>
                    </div>
                    <hr class="mb-4">

                    <h4 class="mb-3">Pagamento</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credito" name="paymentMethod" value="credit_card" type="radio"
                                   class="custom-control-input" checked
                                   required>
                            <label class="custom-control-label" for="credito">Cartão de crédito</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="boleto" name="paymentMethod" value="boleto" type="radio"
                                   class="custom-control-input" required>
                            <label class="custom-control-label" for="boleto">Boleto</label>
                        </div>
                    </div>
                    <div id="sumir-cartao">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cc-nome">Nome no cartão</label>
                                <input type="text" class="form-control" id="cc-nome" name="cc-nome" placeholder=""
                                       required>
                                <small class="text-muted">Nome completo, como mostrado no cartão.</small>
                                <div class="invalid-feedback">
                                    O nome que está no cartão é obrigatório.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cc-numero">Número do cartão de crédito</label>
                                <input type="text" class="form-control" id="cc-numero" name="cc-numero" placeholder=""
                                       required>
                                <div class="invalid-feedback">
                                    O número do cartão de crédito é obrigatório.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiracao">Data de expiração</label>
                                <input type="text" class="form-control" id="cc-expiracao" name="cc-expiracao"
                                       placeholder="" required>
                                <div class="invalid-feedback">
                                    Data de expiração é obrigatória.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cc-cvv">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" name="cc-ccv" placeholder=""
                                       required>
                                <div class="invalid-feedback">
                                    Código de segurança é obrigatório.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="cc-cvv">CPF do títular</label>
                                <input type="text" class="form-control" id="cpf" name="cpf_credit_card" placeholder=""
                                       required>
                                <div class="invalid-feedback">
                                    Código de segurança é obrigatório.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="sumir-boleto" hidden>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="CPF">CPF</label>
                                <input type="text" class="form-control" id="cpf_boleto" name="cpf_boleto" placeholder=""
                                       required>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <input class="btn btn-primary btn-lg btn-block" type="button" id="finish_payment"
                           value="Finalizar Compra">
                </form>
            </div>
        </div>
    </div>
@endsection

@section('link-scirpt')
    <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js')}}"></script>
    <script src="{{asset('js/pagamento/pagamento.js')}}"></script>
    <script src="{{asset('assets/jquery/momenet.js')}}"></script>
@endsection


