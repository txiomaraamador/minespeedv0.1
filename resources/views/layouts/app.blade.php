<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MineSpeed') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> 
</head>
<body>
    @if(Auth::check() && Auth::user()->role == 'visualizer')
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/home">
                {{ config('app.name', 'MineSpeed') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('equipments.index') }}">Ver Equipos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('employees.index') }}">Ver Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('areas.index') }}">Ver Áreas</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownVehicles" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Vehículos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownVehicles">
                            <li><a class="dropdown-item" href="{{ route('vehicles.index') }}">Ver Vehículos</a></li>
                            <li><a class="dropdown-item" href="{{ route('employee_vehicles.index') }}">Ver Vehículos por Empleado</a></li>
                            <li><a class="dropdown-item" href="{{ route('vehicle_areas.index') }}">Ver Vehículos en Áreas</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Cerrar sesión') }}</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    
    
    @endif






    @if(Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'operator'))
    <nav class="navbar bg-body-tertiary fixed-top">
        @auth
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">
                {{ config('app.name', 'MineSpeed') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasNavbarLabel">MENU</h2>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <h5><a class="nav-link active" aria-current="page" href="/home">Pagina principal</a></h5>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Equipos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('equipments.index') }}">Ver Equipos</a></li>
                        <li><a class="dropdown-item" href="{{ route('equipments.create') }}">Agregar Equipos</a></li>

                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Vehiculos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('vehicles.index') }}">Ver Vehiculos</a></li>
                        <li><a class="dropdown-item" href="{{ route('employee_vehicles.index') }}">Ver Vehiculos por empleado</a></li>
                        <li><a class="dropdown-item" href="{{ route('vehicle_areas.index') }}">Ver Vehiculos Area</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('vehicles.create') }}">Agregar Vehiculos</a></li>
                        <li><a class="dropdown-item" href="{{ route('employee_vehicles.create') }}">Asignar Vehiculo por Empleado</a></li>
                        <li><a class="dropdown-item" href="{{ route('vehicle_areas.create') }}">Asignar Vehiculos a un Area</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Empleados
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('employees.index') }}">Ver Empleados</a></li>
                        <li><a class="dropdown-item" href="{{ route('employees.create') }}">Agregar Empleado</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Áreas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('areas.index') }}">Ver Áreas</a></li>
                        <li><a class="dropdown-item" href="{{ route('areas.create') }}">Agregar Área</a></li>
                    </ul>
                </li>
                @if(Auth::user()->role === 'admin')
                <hr style="color: #000000;" />
                
                <h5><a class="nav-link active" aria-current="page" href="#">Catalogos</a></h5>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Tipos de Equipos
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('typeequipments.index') }}">Ver Tipos de Equipos</a></li>
                                    <li><a class="dropdown-item" href="{{ route('typeequipments.create') }}">Agregar Tipo de Equipos</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Tipos de vehiculo
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('typevehicles.index') }}">Ver Tipos de vehiculo</a></li>
                                    <li><a class="dropdown-item" href="{{ route('typevehicles.create') }}">Agregar Tipo de vehiculo</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Cargos
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('positions.index') }}">Ver Cargos</a></li>
                                    <li><a class="dropdown-item" href="{{ route('positions.create') }}">Agregar Cargo</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Usuarios
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('users.index') }}">Ver Usuarios</a></li>
                                    <li><a class="dropdown-item" href="{{ route('register') }}">Registrar Usuarios</a></li>
                                </ul>
                            </li>
                @endif       
                        
                <hr style="color: #000000;" />
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Cuenta</h5>

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
            <hr style="color: #000000;" />
            
        </div>
    </div>
    </div>
    @endauth
    </nav>
@endif
        <div class="container mt-5">
        @yield('content')
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    </body>
</html>