
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Sistema de Gestion FEGASACRUZ</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/css/app.css">
    {{--<link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">--}}
    {{--<!-- Theme style -->--}}
    {{--<link rel="stylesheet" href="dist/css/adminlte.min.css">--}}
    {{--<!-- Google Font: Source Sans Pro -->--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">--}}
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="form-control" id="warning"><i class="fa fa-eye"></i></a>
            </li>
        </ul>
        <div class="col-5" style="float: right;margin-left: 45%">
            <input type="text" class="form-control" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
            <div id="myDropdown" class="dropdown-content">

            </div>
        </div>
        <script>
            function filterFunction() {
                var mydiv = document.getElementById("myDropdown");
                var xhttp=new XMLHttpRequest();
                xhttp.onreadystatechange=function () {
                    if(this.readyState==4 && this.status==200){
                        mydiv.innerHTML="";
                        var data=JSON.parse(this.responseText);
                        console.log(data[0]);
                        data.forEach(function(item){
                            var aTag = document.createElement('a');
                            aTag.setAttribute('href',item.url);
                            aTag.innerText = item.title;
                            mydiv.appendChild(aTag);
                        });
                        mydiv.classList.toggle("show");
                    }
                };
                var input=document.getElementById('myInput').value;
                xhttp.open('GET','/search/'+input,true);
                xhttp.send();
            }
        </script>
        <style type="text/css">
            .dropdown {
                position: relative;
                display: inline-block;
            }
            /* Dropdown Content (Hidden by Default) */
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f6f6f6;
                min-width: 230px;
                border: 1px solid #ddd;
                z-index: 1;
            }
            /* Links inside the dropdown */
            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }
            /* Change color of dropdown links on hover */
            .dropdown-content a:hover {background-color: #f1f1f1}
            /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
            .show {display:block;}
        </style>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-success navbar-badge">{{\Illuminate\Support\Facades\Auth::user()->nick}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a href="{{route('personal.logout')}}" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> Logout
                        <span class="float-right text-muted text-sm">Salir</span>
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                            class="fas fa-th-large"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" id="sidebar">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">

            <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">FEGASACRUZ</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/img/user.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">TecnologiaWeb</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    {{--@if(\Illuminate\Support\Facades\Auth::user()->getRole()==='ADMINISTRADOR')--}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                            <i class="fas fa-shield-alt"></i>
                            <p>Administracion
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fas fa-users"></i>
                                    <p>Empleados</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fas fa-users"></i>
                                    <p>Usuarios</p>
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
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fas fa-sticky-note"></i>
                                    <p>Razas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fas fa-sticky-note"></i>
                                    <p>Unidades</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fas fa-syringe"></i>
                                    <p>Vacunas</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{--@endif--}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-store-alt"></i>
                            <p>Compras
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fas fa-box"></i>
                                    <p>Productos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>Compras</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-clinic-medical"></i>
                            <p>Clinica
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fas fa-briefcase-medical"></i>
                                    <p>Historiales clinicos</p>
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
                                <a href="" class="nav-link">
                                    <i class="fas fa-chart-bar"></i>
                                    <p>Vacunas mas utilizadas</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fas fa-chart-bar"></i>
                                    <p>Compra de Productos</p>
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
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('title','Sistema de gestion FEGASACRUZ')
                <small>@yield('description','')</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('partials.alert')
            @include('partials.error')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@yield('header-title')</h3>
                    @yield('header-content')
                </div>
                <div class="card-body">
                    @yield('content')
                </div>
            </div>
            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            @yield('vistas')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->

<script src="/js/app.js"></script>
<script src="/js/jquery/jquery.min.js"></script>
@stack('scripts')
<script src="/js/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/js/datatables/jquery.dataTables.js"></script>
<script src="/js/datatables/dataTables.bootstrap4.js"></script>
<script>
    var sidebar=document.getElementById('sidebar');
    $('#warning').click(function () {
       sidebar.className='main-sidebar sidebar-dark-secondary elevation-4'
    });
</script>
{{--<script src="/plugins/jquery/jquery.min.js"></script>--}}
{{--<!-- Bootstrap 4 -->--}}
{{--<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>--}}
{{--<!-- AdminLTE App -->--}}
{{--<script src="dist/js/adminlte.min.js"></script>--}}
</body>
</html>
