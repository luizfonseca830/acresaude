<header class="main_menu home_menu">
    
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Acre Saude
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('inicio') }}">{{ __('Inicio') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Logar') }}</a>
                            </li>
                        @endif
                    @else

                        <li class="nav-item dropdown">
                            @if(is_null(auth()->user()))
                                <a class="btn_2 d-none d-lg-block" href="{{route('login')}}">Login</a>
                        @else

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Minha Conta
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if (auth()->user()->pessoa->tipoUsuario->nome == 'Administrador')
                                        <a class="dropdown-item" href="{{route('home.dashboard')}}">Área
                                            Adiministrativa</a>
                                    @endif
                                    @if(auth()->user()->pessoa->tipoUsuario->nome == 'Doutor')
                                        <a class="dropdown-item" href="{{route('agenda.index')}}">Agenda Pessoal</a>
                                    @endif

                                    @if(auth()->user()->pessoa->tipoUsuario->nome == 'Doutor')
                                        <a class="dropdown-item" href="{{route('medico.consultas.index')}}">Consultas
                                            Marcadas</a>
                                    @else
                                        <a class="dropdown-item" href="{{route('paciente.consultas.index')}}">Consultas
                                            Marcadas</a>
                                    @endif
                                    <a class="dropdown-item" href="{{route('minhascompras.index')}}">Minhas Compras</a>
                                    <form method="post" action="{{route('sair')}}">
                                        @csrf
                                        <input type="submit" class="dropdown-item" value="Sair">
                                    </form>
                                </div>
                            </li>

                            @endif
                            </li>
                        @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
