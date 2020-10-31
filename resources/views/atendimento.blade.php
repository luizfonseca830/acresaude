@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div id="meet">

            </div>
        </div>
    </div>
@endsection


<script src='https://meet.jit.si/external_api.js'></script>
<script>
    window.onload = function(){
        const domain = 'meet.jit.si';
        const options = {
            roomName: "{{$metting_option['name_room']}}",
            width: 920,
            height: 620,
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
</script>
