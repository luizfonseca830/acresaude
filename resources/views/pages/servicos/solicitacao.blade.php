@extends('layouts.weelcome.app')
@section('link-css')
    <link rel="stylesheet" href="{{asset('css/servico/solicitacao.css')}}">
@endsection
@section('content')
    <section class="formulario">
        <div class="container">
            <div class="row">
                @dd($errors)
                <form class="col col-12" method="post" action="{{route('solicitacao.store')}}">
                    @csrf
                    <h4>Informações sobre o conselho</h4>
                    <div class="form-group">
                        <label for="conselho">Conselho: </label>
                        <input type="text" class="form-control" placeholder="Informe seu conselho" name="conselho">
                    </div>

                    <div class="form-group">
                        <label for="num_conselho">Número do Conselho: </label>
                        <input type="text" class="form-control" id="num_conselho" placeholder="Informe o número do conselho" name="num_conselho">
                    </div>

                    <div class="form-group">
                        <label for="rqe">RQE:</label>
                        <input type="text" class="form-control" name="rqe" id="rqe" placeholder="Informe o seu RQE">
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
                        <labe for="rg">RG</labe>
                        <input type="text" class="form-control" name="rg" id="rg" placeholder="Informe seu RG">
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-2">
                                <label for="telefone">Telefone: </label>
                                <input type="text" class="form-control" id="telefone" name="telefone"
                                       placeholder="Informe seu numero de telefone fixo">

                                @error('nome')
                                <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col col-6">
                            <div class="form-group mb-2">
                                <label for="celular">Telefone Celular: </label>
                                <input type="text" class="form-control" id="celular" name="celular"
                                       placeholder="Informe seu numero de telefone celular">
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
                    </div>
                    <input type="submit" class="btn btn-outline-primary btn-lg float-right" value="Solicitar">
                </form>
            </div>
        </div>
    </section>
@endsection

@section('link-scirpt')
    <script src="{{asset('assets/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js')}}"></script>
    <script src="{{asset('js/servico/solicitacao.js')}}"></script>
@endsection
