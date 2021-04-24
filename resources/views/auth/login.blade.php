@extends('layouts.weelcome.app')

@section('content')
    <main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading" style="height: 182.188px;">
                    <h2 class="text-info">Logar</h2>
                    <p>Para segurança das transações financeiras sempre exigimos o login antes de efetua-las</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="usuario"
                               class="col-md-4 col-form-label text-md-right">{{ __('Usuário') }}</label>

                        <div class="col-md-6">
                            <input id="usuario" type="text"
                                   class="form-control @error('usuario') is-invalid @enderror"
                                   name="usuario" value="{{ old('usuario') }}" required
                                   autocomplete="usuario" autofocus>

                            @error('usuario')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password"
                               class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-8 offset-md-3">

                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                        <a class="btn btn-primary"
                           href="{{ route('register') }}">{{ __('Faça teu cadastro') }}</a>


                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Esqueceu a senha?! Clique aqui.') }}
                            </a>
                        @endif
                    </div>

                </form>

            </div>

        </section>
    </main>
@endsection

@section('link-script')
    <script src="{{asset('assets/alertifyjs/alertify.min.js')}}"></script>
    @include('notifications.notification')
@endsection
