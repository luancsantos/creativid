<nav class="navbar navbar-default navbar-fixed-top">
        <div class="brand">
            <a href="{{route('home')}}"><img style="width: 100px;" src="{{ asset('assets/img/logo.jpeg') }}" alt="HomeJobs Logo" class="img-responsive logo"></a>
        </div>
        <div class="container-fluid">
            @if(Auth::user()->type_user_id == 1)
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="{{route('home')}}"><span>Dashboard</span></a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>XML+</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
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
                        <a href="{{route('tickets.index')}}"><span>Chamados</span></a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Empréstimos</span></a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Configurações</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('users.index')}}">Usuários</a></li>
                            <li><a href="{{route('clients.index')}}">Clientes</a></li>
                            <li><a href="{{route('users-type.index')}}">Tipos de Usuários</a></li>
                            <li><a href="{{route('types.index')}}">Tipos de Chamados</a></li>
                            <li><a href="{{route('status.index')}}">Status</a></li>
                            <li><a href="{{route('departments.index')}}">Departamentos</a></li>
                            <li><a href="{{route('health-insurance.index')}}">Convênios</a></li>
                        </ul>
                    </li>
                </ul>
            @else
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    <a href="{{route('tickets.index')}}"><span>Chamados</span></a>
                </li>
            </ul>
            @endif
            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                             <span>Olá  {{ Auth::user()->name }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('password.reset', Auth::user())}}"><i class="lnr lnr-user"></i> <span>Alterar Senha</span></a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 <i class="lnr lnr-exit"></i>{{ __('Logout') }}
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
