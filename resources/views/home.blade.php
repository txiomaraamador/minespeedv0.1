@extends('layouts.app')

@section('content')
<br>
<div class="card bg-light text-center w-100 mb-10">
    <div class="card-body">
        <h1 class="card-title mx-auto">VELOCIMETRO</h1>
        
    </div>
    <h5 class="card-title mx-auto">ALETRAS PARA ATENCION</h5>
    @if(session('error'))
    <div id="alert" class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    @if(session('success'))
        <div id="alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <script>
        // Código JavaScript para ocultar la alerta después de unos segundos
        setTimeout(function(){
            var alert = document.getElementById('alert');
            if(alert) {
                alert.style.display = 'none';
            }
        }, 3000); // La alerta se ocultará después de 5 segundos (5000 milisegundos)
    </script>
    <div class="table-responsive mx-auto" style="margin: 20px;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Tiempo de suseso: </th>
                    <th scope="col">Velicidad: </th>
                    <th scope="col">Camara de registro: </th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($reports as $report)
                <tr>
                    <th scope="row"><i class="bi bi-exclamation-triangle icon-al"></i></th>
                    <td>{{ $report->exittime }}</td>
                    <td>{{ $report->speed }} km/h</td>
                    <td>{{ $report->camera_ip }}</td>
                    <td>
                        <a href="{{ route('histories.create', $report->id) }}" class="btn btn-sm btn-secondary" style="background-color: #ee194f;; border-color: #ee194f;; color: #fff;">Ver detalles</a>
                    </td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
</div>


<div class="card-group">
    <div class="card">
        <div class="card-body ">
            <i class="bi bi-pin-map icon-lg bg-light"></i>
            <div>
                <h5 class="card-title">Area de Vehiculos</h5>
                <p class="card-text">Ver el area de vehiculos disponibles.</p>
                <p class="card-text"><small class="text-body-secondary">Presione para ir a la lista de areas</small></p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <i class="bi bi-truck icon-lg bg-light"></i>
            <div>
                <h5 class="card-title">Vehiculos</h5>
                <p class="card-text">Ver los vehiculos disponibles.</p>
                <p class="card-text"><small class="text-body-secondary">Presione para ir a la lista de vehiculos</small></p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <i class="bi bi-people icon-lg bg-light"></i>
            <div>
                <h5 class="card-title">Empleados</h5>
                <p class="card-text">Ver los empleados activos.</p>
                <p class="card-text"><small class="text-body-secondary">Presione para ir a la lista de empleados</small></p>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    /* Estilo adicional para cambiar el color del icono y ajustar el espacio */
    .icon-lg {
        font-size: 3rem; /* Tamaño grande */
        width: 100px; /* Ancho del contenedor */
        height: 100px; /* Alto del contenedor */
        color: black; /* Color del icono */
        background-color: #e0e0e0; /* Fondo gris claro */
        padding: 1rem; /* Espacio alrededor del icono */
        border-radius: 10px; /* Borde redondeado */
        margin-right: 1rem; /* Espacio a la derecha del icono */
        margin-bottom: 0rem; /* Espacio debajo del icono */
    }

    .icon-al {
        color: red; /* Color del icono */
       
    }

    .card-body {
        display: flex; /* Utilizar flexbox para el diseño */
        align-items: center; /* Centrar verticalmente los elementos */
    }
    
    .card {
        border: none; /* Eliminar el borde de la tarjeta */
    }
    
    .card-title {
        margin-bottom: 0.5rem; /* Espacio inferior de la etiqueta de título */
    }

</style>

@endsection
