@extends('layouts.weelcome.app')
@section('link-css')
    <link rel="stylesheet" href="{{asset('css/servico/solicitacao.css')}}">
@endsection
@section('content')
    <section class="formulario">
        <div class="container">
            <div class="row">
{{--                @dd($errors)--}}
                <form class="col col-12" method="post" action="{{route('solicitacao.store')}}"
                      enctype="multipart/form-data">
                    @csrf
                    <h2>Informações de Usuário</h2>
                    <hr>
                    <div class="form-group">
                        <label for="usuario">Digite seu Usuário</label>
                        <input type="text" class="form-control" id="usuario" name="usuario"
                               placeholder="Informe seu Usuário" value="{{old('usuario')}}" required>
                        @error('usuario')
                        <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Endereço de Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email"
                               value="{{old('email')}}" required>
                    </div>
                    @error('email')
                    <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                    <div class="form-group">
                        <label for="password">Digite sua Senha</label>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Digite sua senha">
                    </div>
                    @error('password')
                    <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                    <div class="form-group">
                        <label for="confirm-password">Confirma sua Senha</label>
                        <input type="password" class="form-control" id="confirm-password" name="confirm_passowrd"
                               placeholder="Confirme sua senha">
                    </div>
                    @error('confirm_passowrd')
                    <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                    <h2>Informações Pessoais</h2>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-2">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome"
                                       placeholder="Digite seu nome" value="{{old('nome')}}" required>

                                @error('nome')
                                <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col col-6">
                            <div class="form-group mb-2">
                                <label for="sobrenome">Sobrenome</label>
                                <input type="text" class="form-control" id="sobrenome" name="sobrenome"
                                       placeholder="Digite seu Sobrenome" value="{{old('sobrenome')}}" required>
                                @error('sobrenome')
                                <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-2">
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf"
                                       placeholder="Digite seu CPF" value="{{old('cpf')}}">
                                @error('cpf')
                                <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col col-6">
                            <div class="form-group mb-2">
                                <label for="cnpj">CNPJ</label>
                                <input type="text" class="form-control" id="cnpj" name="cnpj"
                                       placeholder="Digite seu CNPJ" value="{{old('cnpj')}}">
                                @error('cnpj')
                                <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label for="data_nascimento">Data de Nascimento</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento"
                               value="{{old('data_nascimento')}}" required>
                    </div>
                    @error('data_nascimento')
                    <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <h2>Informações de Endereço</h2>
                    <hr>
                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep"
                               placeholder="Digite seu CEP" value="{{old('cep')}}" required>
                        @error('cep')
                        <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="form-group col col-6">
                            <label for="uf">UF</label>
                            <input type="text" class="form-control" id="uf" name="uf"
                                   placeholder="Informe sua UF" value="{{old('uf')}}" required/>

                        </div>

                        <div class="form-group col col-6">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro"
                                   placeholder="Informe seu Bairro" value="{{old('bairro')}}" required/>
                        </div>


                    </div>

                    <div class="row">
                        <div class="form-group col col-6">
                            <label for="municipio">Município</label>
                            <input type="text" class="form-control" id="municipio" name="municipio"
                                   placeholder="Informe seu Município" value="{{old('municipio')}}" required/>
                        </div>

                        <div class="form-group col col-6">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento"
                                   placeholder="Complemento caso necessário" value="{{old('complemento')}}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco"
                               placeholder="Informe seu endereço" value="{{old('endereco')}}" required/>
                    </div>
                    <h4>Informações sobre o conselho</h4>
                    <div class="form-group">
                        <label for="conselho">Conselho: </label>
                        <input type="text" class="form-control" placeholder="Informe seu conselho" name="conselho">
                        @error('conselho')
                        <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="num_conselho">Número do Conselho: </label>
                        <input type="text" class="form-control" id="num_conselho"
                               placeholder="Informe o número do conselho" name="num_conselho">
                        @error('num_conselho')
                        <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="rqe">RQE:</label>
                        <input type="text" class="form-control" name="rqe" id="rqe" placeholder="Informe o seu RQE">
                        @error('rqe')
                        <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="especialidade_id">Especialidade</label>
                        <select class="form-control" id="especialidade_id" name="especialidade_id">
                            <option value="">Não Selecionado</option>
                            @foreach($especialidades as $especilidade)
                                <option value="{{$especilidade->id}}">{{$especilidade->especialidade}}</option>
                            @endforeach
                        </select>
                        @error('especialidade_id')
                        <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <hr>

                    <h4>Dados Pessoais - Complementares</h4>
                    <div class="form-group">
                        <label for="rg">RG</label>
                        <input type="text" class="form-control" name="rg" id="rg" placeholder="Informe seu RG">
                        @error('rg')
                        <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-2">
                                <label for="telefone">Telefone: </label>
                                <input type="text" class="form-control" id="telefone" name="telefone"
                                       placeholder="Informe seu numero de telefone fixo">
                                @error('telefone')
                                <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col col-6">
                            <div class="form-group mb-2">
                                <label for="celular">Telefone Celular: </label>
                                <input type="text" class="form-control" id="celular" name="celular"
                                       celular="Informe seu numero de telefone celular">
                                @error('sobrenome')
                                <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4>Procedimentos</h4>
                    <div class="form-group">
                        <label for="procedimento">Procedimentos de Exames/Consultas</label>
                        <label class="float-right text-info" id="total_textarea">500</label>
                        <textarea class="form-control" id="procedimento" name="procedimento" rows="3"></textarea>
                        @error('procedimento')
                        <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-outline-primary btn-lg float-right" value="Solicitar">
                </form>
            </div>
        </div>
    </section>
@endsection

@section('link-scirpt')
    <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/register/cep.js')}}"></script>
    <script src="{{asset('assets/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js')}}"></script>
    <script src="{{asset('js/register/cnpj_cpf_block_input.js')}}"></script>
    <script src="{{asset('js/servico/solicitacao.js')}}"></script>
@endsection
