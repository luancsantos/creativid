<nav class="navbar navbar-default navbar-fixed-top">
        <div class="brand">
            <a href="#"><img style="width: 100px;" src="{{ asset('assets/img/logo.jpeg') }}" alt="HomeJobs Logo" class="img-responsive logo"></a>
        </div>
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
            </div>
            @if(Auth::user()->id == 1)
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Dashboard</span></a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>XML+</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('users.index')}}">Importar</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Prometheus</span></a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Indicadores</span></a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="{{route('tickets.index')}}" class="dropdown-toggle" data-toggle="dropdown"><span>Chamados</span></a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Empréstimos</span></a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Configurações</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('users.index')}}">Usuários</a></li>
                            <li><a href="{{route('clients.index')}}">Clientes</a></li>
                            <li><a href="{{route('types.index')}}">Tipos de Chamados</a></li>
                            <li><a href="{{route('status.index')}}">Status</a></li>
                            <li><a href="{{route('departments.index')}}">Departamento</a></li>
                        </ul>
                    </li>
                </ul>
            @else
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    <a href="{{route('tickets.index')}}" class="dropdown-toggle" data-toggle="dropdown"><span>Chamados</span></a>
                </li>
            </ul>
            @endif
            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('assets/img/user5.png') }}" class="img-circle" alt="Avatar"> <span>Administrator</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                                @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
