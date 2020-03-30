<div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                @if(Auth::user()->id == 1)
                    <li><a href="/home" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                    <li><a href="{{route('clients.index')}}" class=""><i class="lnr lnr-user"></i> <span>Clientes</span></a></li>
                    <li><a href="{{route('tickets.index')}}" class=""><i class="lnr lnr-rocket"></i> <span>Chamados</span></a></li>
                    <li><a href="{{route('users.index')}}" class=""><i class="lnr lnr-thumbs-up"></i> <span>Usuários</span></a></li>
                    <li>
                        <a href="#glosas" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Glosas</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="glosas" class="collapse ">
                            <ul class="nav">
                                <li><a href="{{route('status.index')}}" class=""><i class="lnr lnr-bookmark"></i> <span>XML+</span></a></li>
                                <li><a href="{{route('types.index')}}" class=""><i class="lnr lnr-location"></i> <span>Indicadores</span></a></li>
                                <li><a href="{{route('departments.index')}}" class=""><i class="lnr lnr-inbox"></i> <span>Prometheus</span></a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Configurações</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="subPages" class="collapse ">
                            <ul class="nav">
                                <li><a href="{{route('types.index')}}" class=""><i class="lnr lnr-location"></i> <span>Tipos de Chamados</span></a></li>
                                <li><a href="{{route('status.index')}}" class=""><i class="lnr lnr-bookmark"></i> <span>Status</span></a></li>
                                <li><a href="{{route('departments.index')}}" class=""><i class="lnr lnr-inbox"></i> <span>Departamentos</span></a></li>
                            </ul>
                        </div>
                    </li>
                @else
                <li><a href="{{route('tickets.index')}}" class=""><i class="lnr lnr-rocket"></i> <span>Chamados</span></a></li>
                @endif
            </ul>
        </nav>
    </div>
