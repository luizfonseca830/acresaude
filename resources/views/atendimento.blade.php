@extends('layouts.weelcome.app')
@section('link-css')
    <link rel="stylesheet" href="{{asset('css/loja/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/atendimento/style.css')}}">
@endsection
@section('content')
    <div class="container @if(auth()->user()->pessoa->tipoUsuario->nome != 'Doutor') text-center @endif ajuste">
        @if(auth()->user()->pessoa->tipoUsuario->nome == 'Doutor')
            <div class="prontuario ">
                <form method="post" action="{{route('medico.consulta.salvaProntuario', $metting_option->id)}}">
                    @csrf
                    <h5>Prontuário Eletrônico</h5>
                    <hr>
                    <div class="countdown"></div>
                    <div class="form-group">
                        <label for="prontuario">Informações do prontuário</label>
                        <textarea class="form-group" name="prontuario" rows="10" cols="35" required maxlength="300"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-dark font-weight-bold float-right"
                               value="Salvar e Finalizar">
                    </div>
                </form>
            </div>
        @endif

        <div id="meet"></div>
        @if(auth()->user()->pessoa->tipoUsuario->nome != 'Doutor')
            @csrf
        @endif

    </div>
@endsection


<script src='https://meet.jit.si/external_api.js'></script>
<script>
    window.onload = function () {
        const domain = 'meet.jit.si';
        const options = {
            roomName: "{{$metting_option->sala_consulta}}",
            width: 920,
            height: 620,
            userInfo: {
                displayName: "{{auth()->user()->pessoa->nome}}"
            },
            interfaceConfigOverwrite: {
                filmStripOnly: false,
                TOOLBAR_BUTTONS: [
                    'microphone', 'camera', 'closedcaptions', 'desktop', 'fullscreen',
                    'fodeviceselection', 'profile', 'chat', 'recording',
                    'livestreaming', 'etherpad', 'sharedvideo', 'settings', 'raisehand',
                    'videoquality', 'filmstrip', 'invite', 'feedback', 'stats', 'shortcuts',
                    'tileview', 'videobackgroundblur', 'download', 'help', 'mute-everyone',
                    'e2ee', 'security'
                ],

            },
            parentNode: document.querySelector('#meet')
        };
        const api = new JitsiMeetExternalAPI(domain, options);
    }

    var timer2 = "15:01";
    var interval = setInterval(function () {
        var timer = timer2.split(':');
        //by parsing integer, I avoid all extra string processing
        var minutes = parseInt(timer[0], 10);
        var seconds = parseInt(timer[1], 10);
        --seconds;
        minutes = (seconds < 0) ? --minutes : minutes;
        if (minutes < 0) clearInterval(interval);
        seconds = (seconds < 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;
        //minutes = (minutes < 10) ?  minutes : minutes;
        $('.countdown').html(minutes + ':' + seconds);
        timer2 = minutes + ':' + seconds;
    }, 1000);

    //AJAX PARA FINALIZAR PARA O PACIENTE
    @if(auth()->user()->pessoa->tipoUsuario->nome != 'Doutor')
    setInterval(function () {
        var _token = $("input[name='_token']").val();
        var consulta_id = {{$metting_option->id}}
        $.ajax({
            url: "/paciente/finalizar",
            type: 'POST',
            data: {_token: _token, consulta_id: consulta_id},
            success: function (data) {
                if (data == 1) {
                    {{session()->put('sucess', 'Sua consulta terminou!')}}
                    window.location.href = "/paciente/minhasconsultas";
                }
            }
        });
    }, 3000);

    @endif
</script>
