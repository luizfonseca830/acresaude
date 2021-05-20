<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
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
    <div class="app-header__menu">
                <span>
                    <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
    </div>
    <div class="app-header__content">
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                    <i style="font-size: 15px" class="fas fa-user-tie"></i>
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                     class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right" style="">
                                    <div class="dropdown-menu-header">
                                        <div class="dropdown-menu-header-inner bg-info">
                                            <div class="menu-header-image opacity-2"></div>
                                            <div class="menu-header-content text-left">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <i class="fas fa-user-tie"></i>
                                                        </div>
                                                        <div class="widget-content-left">
                                                            <div
                                                                class="widget-heading">{{auth()->user()->pessoa->nome}}</div>
                                                            <div class="widget-subheading opacity-8">Admin</div>
                                                        </div>
                                                        <div class="widget-content-right mr-2">
                                                            <input type="button"
                                                                   class="btn-pill btn-shadow btn-shine btn btn-focus"
                                                                   value="Sair" href="{{ route('logout') }}"
                                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                            <form id="logout-form" action="{{ route('logout') }}"
                                                                  method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
