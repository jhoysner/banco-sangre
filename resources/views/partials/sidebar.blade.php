<aside class="main-sidebar" style="margin-top:24px">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU DE NAVEGACION</li>
            <li class="treeview" style="margin-top: 10px;">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Menu</span>
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: block;">
                    <li><a href="{{ route('users.index') }}"> <i class="fa fa-user"></i>Personal</a></li>
                    <li><a href="{{ route('donante.index') }}"> <i class="fa fa-users"></i>Donante</a></li>
                    {{-- <li><a href="{{ route('aprobacion.index') }}"> <i class="fa fa-file"></i>Aprobar</a></li> --}}
                    <li><a href="{{ route('pruebas.index') }}"> <i class="fa fa-file"></i>Pruebas</a></li>
                    <li><a href="{{ route('consultar.index') }}"> <i class="fa fa-search"></i>Consultar</a></li>
                    
                </ul>
            </li>
        </ul>
    </section>
</aside>
