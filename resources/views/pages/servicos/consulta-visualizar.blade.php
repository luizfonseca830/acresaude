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
                        <h4>Intruçoes</h4>
                        <hr>
                    </div>
                    <p>
                        Cras in interdum ligula. Vestibulum congue placerat eros vitae scelerisque. Pellentesque
                        suscipit, mi et porttitor imperdiet, turpis urna laoreet erat, non vulputate lectus est tempus
                        ante. Aenean quis quam purus.
                    </p>
                    <p>
                        Fusce ultricies, arcu a consequat ultricies, nisi metus finibus
                        nisl, ac dictum orci quam vel orci. Quisque at mattis neque. Nunc pellentesque sit amet massa
                        non ornare. Praesent venenatis tortor consequat nisi interdum, vitae sodales felis varius.
                        Maecenas vel lectus sit amet augue iaculis luctus consequat ac sem. Curabitur efficitur enim
                        lectus, et aliquam mi mattis ac. Donec facilisis, dolor vitae efficitur vestibulum, justo tellus
                        dapibus lectus, nec rhoncus libero ante ut ex. Quisque ut urna non turpis rhoncus ullamcorper.
                        Aenean facilisis placerat dignissim. Fusce sed aliquam diam. Donec ipsum libero, semper id
                        consectetur vel, mollis ac mauris. Quisque pulvinar tortor sit amet enim molestie, non
                        vestibulum orci suscipit.
                    </p>
                    <p>
                        Nam ut efficitur dui, nec gravida nisl. Ut faucibus aliquet erat quis sagittis. Pellentesque
                        maximus odio est, sed consectetur eros malesuada at. Proin sit amet maximus magna. Curabitur sed
                        placerat neque. Praesent semper ullamcorper elit, ac maximus nunc mollis sit amet. Vestibulum eu
                        magna id massa posuere pellentesque non ac orci.
                    </p>
                </div>

                <div class="col col-6 fundo-2-col">
                    <div class="title text-center">
                        <hr>
                        <h4>Escolha o horário da sua Consulta</h4>
                        <hr>
                    </div>
                    <form method="post">
                        <div class="form-group">
                            <label for="medico">Médico</label>
                            <select class="form-control" id="medico">
                                <option value="">Não Selecionado</option>
                                @foreach($especialidade->medicoEspecialidade as $medicoEsp)
                                    <option value="{{$medicoEsp->medico->id}}">{{$medicoEsp->medico->pessoa->nome}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="horario">Horários Disponíveis </label>
                            <select class="form-control" id="horario">
                                <option value="">Não Selecionado</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('link-scirpt')
    <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/consultas/consultas.js')}}"></script>
@endsection
