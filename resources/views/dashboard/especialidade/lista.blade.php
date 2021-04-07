@extends('layouts.dashboard.app')
@section('link-css')
    <link rel="stylesheet" href="{{asset('assets/alertifyjs/css/alertify.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/alertifyjs/css/alertify.rtl.min.css')}}">
@endsection

@section('card')
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($especialidades as $especialidade)
                <tr>
                    <td>{{$especialidade->especialidade}}</td>
                    <td>{{$especialidade->descricao}}</td>
                    <td>
                        <a href="{{route('especialidade.edit.dashboard', $especialidade->id)}}"
                           title="Editar Especialidade"><i class="fa fa-pen"
                                                           style="color: blue"></i></a>
                        <a data-toggle="modal" id="smallModal" data-target="#smallModal"
                           title="Deletar Especialidade">
                            <i class="fa fa-trash" style="color: red"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>

            <tfoot>
            <tr>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Ações</th>
            </tr>
            </tfoot>
        </table>
    </div>

    <div class="modal-dialog" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
       aria-hidden="true">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="smallModal-body" id="smallModal">
                    <div>
                        <form action="{{route('especialidade.destroy.dashboard', $especialidade->id)}}" method="post">
                            <div class="modal-body">
                                @csrf
                                @method('DELETE')
                                <h5 class="text-center">Queres deletar a especialidade:  {{ $especialidade->especilidade }} ?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger">Sim, Deletar Especialidade</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
@endsection

@section('link-scirpt')
    <script src="{{asset('assets/alertifyjs/alertify.min.js')}}"></script>
    <script>
        // display a modal (small modal)
        $(document).on('click', '#smallButton', function (event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href
                , beforeSend: function () {
                    $('#loader').show();
                },
                // return the result
                success: function (result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                }
                , complete: function () {
                    $('#loader').hide();
                }
                , error: function (jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                }
                , timeout: 8000
            })
        });

    </script>
    @include('notifications.notification')
@endsection

