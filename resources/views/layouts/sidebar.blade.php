<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        {{--@if(\Illuminate\Support\Facades\Auth::user()->getRole()==='ADMINISTRADOR')--}}
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
                <i class="fas fa-shield-alt"></i>
                <p>AdministracionRRHH
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>Personal</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('clientes.index')}}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>Clientes</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fas fa-book-open"></i>
                <p>Parámetros
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('ubicacion.index')}}" class="nav-link">
                        <i class="fas fa-sticky-note"></i>
                        <p>Ubicaciones</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('actividad.index')}}" class="nav-link">
                        <i class="fas fa-sticky-note"></i>
                        <p>Actividades</p>
                    </a>
                </li>
            </ul>
        </li>
        {{--@endif--}}
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fas fa-store-alt"></i>
                <p>Procesos
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('solicitudes.index')}}" class="nav-link">
                        <i class="fas fa-box"></i>
                        <p>Solicitud</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('titulos.index')}}" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>
                        <p>Titulo</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('marcas.index')}}" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>
                        <p>Marca</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('planos.index')}}" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>
                        <p>Plano</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fas fa-file-contract"></i>
                <p>Reportes
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('rpt_cliente_solicitud')}}" class="nav-link">
                        <i class="fas fa-chart-bar"></i>
                        <p>Reporte de solicitudes</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('rpt_top_actividades')}}" class="nav-link">
                        <i class="fas fa-chart-bar"></i>
                        <p>Actividades mas utilizadas</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="" class="nav-link active">
                        <i class="fas fa-chart-bar"></i>
                        <p>Cliente Frecuente</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>