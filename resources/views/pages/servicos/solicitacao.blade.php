@extends('layouts.weelcome.app')
@section('link-css')
    <link rel="stylesheet" href="{{asset('css/servico/solicitacao.css')}}">
@endsection
@section('content')
    <section class="formulario">
        <div class="container">
            <div class="row">
                <form class="col col-12" method="post" action="{{route('solicitacao.store')}}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <h4 for="exampleFormControlSelect1">Especialidades</h4>
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

                    <div class="form-group">
                        <h4 for="file_conf_med">Documento de Confirmação de Medicina ou Consultória.</h4>
                        <input type="file" class="form-control-file" id="file_conf_med" name="file_conf_med">
                        @error('file_conf_med')
                        <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <h4 for="file_conf_esp">Documento de Confirmação de Especialidade.</h4>
                        <input type="file" class="form-control-file" id="file_conf_esp" name="file_conf_esp">
                        @error('file_conf_esp')
                        <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-outline-primary btn-lg float-right" value="Solicitar">
                </form>
            </div>
        </div>
    </section>
@endsection
