<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{route('inicio')}}"> <img
                            src="data:image/webp;base64,UklGRqIDAABXRUJQVlA4TJUDAAAvdsAGEJfDJpIkIX3LS8EV/iMkULUXYoF1JKtB1gmQsQ/7r8Vm/JIwCNq2jQNn/KEcz1W4tW2rqjbuFrk7dODeC/3QirulxE7qdu99uP6fwP3cP+jPcz2CB07740EHeXtoA64g4BKOWCTCJCQAHmQSgCsIOBSTahiAJgMYnOAn/IEmyCGBBCM020bnNkIXv0SCCUgA/hL4swBSTPd4Iz9LKJEZYfiggxx8xL9vkTbDtt37flVbFQPQbQAHB/g9/kC3J4cE0j2e+HUIdsAA/iGABAQEH3ywxBAUF0zwvQqvI7JDfzYxchMVQGvbNkOS9D6RkYzI+Ma2zbVtjI21/f/PIjMrs3r7PKL/E6Dxi6dPHdm2Y9fuG3fuPXz89Nnz58+fa6Oa1vjai+fPHDu6ZefGSzhHlJRK36/BS9cvXVio71PfT0kp9WkeCw6CJA8s9+UrV5fqyW0sATibRaqH3Dp88erLi0kt0I7VQK+5w1AH9VKfv7YWCXBjALaUzLTwe2+shwH0QxFwWmzxt999feT44UMHD+yZr6igGip9MZYq54pmpPPO1d1A6LqqGwreOR+G2sI5H7L33xw7IUl753MJGDDiWANNBGeSzEHbOTLzQDlQQBc9XlICYgde+vSdtUEOQtYhNxSgkyKUkgroJblM6qDKPJhUQJQBJkXw+uytNWrBZ0U1Bk6SHJg6qCUpDKWhAI0kB0ENtJLkof9g6Mrlc2dPZvtu3rr/YC4DTEr0IxGqrMgK6CfZkAeT1FCYHKSsherDoRc0+Z+5VEIjNWikBpxzBRAMsBmModwAywJUHy3x/WoRnEQzVkHTxxj7GM3AaR6nKU55AvfxEj+sJgd9j00KGl0rA/fJEj/P0EBVFZrUbogIxciVy+fOnsz23bx1/8HQLzMYQJjQQjUmBzYPaUQOLAtQjVy9dOHMiWzvjTv3Hg79sYKTJA9oQgJswEcVELJmmjy0A2UtDzGroVnix2+nRbIA1RAmqQCfNSR1UGRAKylBKakHTFJHVIAyA2yJ3zQ5ldQmCXrJOqA1KQFFCJ5aUgGlmQdcL6uAaFINtF2Jl1RCJ5XQadLxw4cOHtgz9tN3kwI4MKlGkmPQpFSQN8pLANcABHAOKkkNeam8JXdR044d3bJz1+6Rb37XzKZVUwjRNJxC6GVJK8cQTMMWQ+ilJX7V//xsf2tTevKXNqV//9RmdPu/R9pstm7f/9XXd7UpAgA="
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
