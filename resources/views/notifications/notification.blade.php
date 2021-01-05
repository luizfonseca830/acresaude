<div class="container">
    <div class="row justify-content-end">
        <script>
            @if ( session()->get('sucess') )
                var msg = "{{session()->get('sucess')}}"
                alertify.set('notifier','position', 'top-center');
                alertify.success('Notificação : ' + msg );
            {{session()->forget('sucess')}}
            @endif

            @if ( session()->get('error') )
                var msg = "{{session()->get('error')}}"
                alertify.set('notifier','position', 'top-center');
                alertify.error('Notificação: ' + msg);
                {{session()->forget('sucess')}}
            @endif

        </script>
    </div>
</div>
