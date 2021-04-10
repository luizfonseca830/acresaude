<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
            </button>
        </div>
    </div>


    <div class="scrollbar-sidebar ps ps--active-y">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu metismenu">
                <li class="app-sidebar__heading">Menu</li>
                <li class="mm-active">
                    <a href="#" aria-expanded="true">
                        <i class="metismenu-icon pe-7s-ribbon"></i>Listas
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-show mm-collapse">
                        <li>
                            <a href="{{route('lista.usuario.dashboard')}}">
                                <i class="metismenu-icon"></i>Usuários
                            </a>
                        </li>

                        <li>
                            <a href="{{route('especialidade.list.dashboard')}}">
                                <i class="metismenu-icon"></i>Especialidades
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="metismenu-icon"></i>Aceitar Usuário
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-headphones"></i>Solicitações
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse">
                        <li>
                            <a href="{{route('solicitacao.medico.dashboard')}}">
                                <i class="metismenu-icon"></i> Médicos
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-browser"></i>Casdatro
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse">
                        <li>
                            <a href="#">
                                <i class="metismenu-icon"></i> Usuário
                            </a>
                        </li>

                        <li>
                            <a href="{{route('especialidade.create.dashboard')}}">
                                <i class="metismenu-icon"></i> Especialidade
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </div>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 640px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 405px;"></div></div></div>


</div>
