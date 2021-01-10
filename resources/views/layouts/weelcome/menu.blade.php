<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">

                    <a class="navbar-brand" href="{{route('inicio')}}"> <img
                            src="{{asset('images/logoprincipal.png')}}"
                            alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse main-menu-item justify-content-center"
                         id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('inicio')}}">Início</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Doutores</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Páginas
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Serviços</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @if(is_null(auth()->user()))
                        <a class="btn_2 d-none d-lg-block" href="{{route('login')}}">Login</a>
                    @else
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Minha Conta
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if (auth()->user()->pessoa->tipoUsuario->nome == 'Administrador')
                                        <a class="dropdown-item" href="{{route('home.dashboard')}}">Área Adiministrativa</a>
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
                        </ul>
                    @endif
                </nav>
            </div>
        </div>
    </div>
</header>
