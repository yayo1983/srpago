<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Soft-Test-SrPago') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">

    <link href="{{ asset('css/map.css') }}" rel="stylesheet" type="text/css">

    @stack('style')
</head>
<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="{{route('index')}}">Bienvenido</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @auth <i class="fas fa-user-circle fa-fw">  {{ '   '. Auth::user()->name }} </i>@endauth
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
               {{-- <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="#">Activity Log</a>--}}
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">Cerrar sesión
                    <i class="fas fa-fw fa-sign-out-alt"></i></a>
            </div>
        </li>
    </ul>
</nav>
<div id="app">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('index') }}">
                    <i class="fas fa-fw fa-warehouse"></i>
                    <span>Inicio</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('upload') }}">
                    <i class="fas fa-fw fa-file-import"></i>
                    <span>Importar fichero xls 	de códigos postales</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('consultar') }}">
                    <i class="fas fa-fw fa-oil-can"></i>
                    <span>Consultar precios de gasolina</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('form') }}">
                    <i class="fas fa-fw fa-search"></i>
                    <span>Formulario filtro</span></a>
            </li>
        </ul>
        <div id="content-wrapper">

            <div class="container-fluid">
                <main class="py-4">
                @yield('content')
                </main>
            </div>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="">Cerrar sesión</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>

    <!-- Page level plugin JavaScript-->
    {{--<script src="{{ asset('js/Chart.min.js') }}"></script>--}}
    <script src="{{ asset('js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin.min.js') }}"></script>

    <!-- Demo scripts for this page-->
    <script src="{{ asset('js/datatables-demo.js') }}"></script>

    <!-- scripts api for map from google map-->
    <script src="{{ asset('js/apigoogpejs.js') }}"></script>

   <!-- Demo scripts for generate map in web-->
   <script src="{{ asset('js/map.js') }}"></script>

    @stack('scripts')
</body>
</html>
