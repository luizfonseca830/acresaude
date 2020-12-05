@extends('layouts.weelcome.app')
@section('link-css')
    <link rel="stylesheet" href="{{asset('css/loja/style.css')}}">
@endsection
@section('content')
    <div class="container ajuste">
        <h2>Pacotes</h2>
        <hr>
        <div class="row justify-content-center">

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" data-src="holder.js/100px180/?text=Image cap" alt="Image cap [100%x180]"
                     src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1762faebb29%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1762faebb29%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2299.1171875%22%20y%3D%2296.3%22%3EImage%20cap%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                     data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                <div class="card-body text-center">
                    <p>R$ 1000.00</p>
                    <a data-toggle="modal" data-target="#loja"><input type="button" class="btn btn-outline-primary"
                                                                      value="Comprar"></a>
                </div>
            </div>
        </div>
    </div>


    {{--    MODAL--}}
    <div class="modal fade" id="loja" tabindex="-1" role="dialog" aria-labelledby="loja" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informações de Pagamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('loja.store')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nome Completo:</span>
                            </div>
                            <input type="text" name="nome_completo" class="form-control" aria-describedby="basic-addon3" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Número do Cartão:</span>
                            </div>
                            <input type="text" name="numero_cartao" class="form-control" aria-describedby="basic-addon3" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Data de Vencimento:</span>
                            </div>
                            <input type="date" name="data_vencimento" class="form-control" aria-describedby="basic-addon3" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">CSV:</span>
                            </div>
                            <input type="number" name="csv" class="form-control" aria-describedby="basic-addon3" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fecha</button>
                        <input type="submit" class="btn btn-primary" value="Confirmar Compra">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
