@extends('layouts.app')

@section('content')

<div class="card bg-light text-center w-100 mb-10">
    <div class="card-body">
        <h1 class="card-title mx-auto">VELOCIMETRO</h1>
        
    </div>
    <h5 class="card-title mx-auto">ALETRAS PARA ATENCION</h5>
    <div class="table-responsive mx-auto" style="margin: 20px;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Empleado</th>
                    <th scope="col">No. de vehiculo</th>
                    <th scope="col">Velocidad</th>
                    <th scope="col">Area</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <th scope="row"><i class="bi bi-exclamation-triangle icon-al"></i></th>
                    <td>Carlos Eduardo Lopez Avila</td>
                    <td>07</td>
                    <td>200km/h</td>
                    <td>Zona de descarga</td>
                    <td>
                        <button type="submit" class="btn btn-sm btn-primary" style="background-color: #ee194f;; border-color: #ee194f;; color: #fff;">Ver detalles</button>
                    </td>
                </tr>
               
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
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <i class="bi bi-truck icon-lg bg-light"></i>
            <div>
                <h5 class="card-title">Vehiculos</h5>
                <p class="card-text">Ver los vehiculos disponibles.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <i class="bi bi-people icon-lg bg-light"></i>
            <div>
                <h5 class="card-title">Empleados</h5>
                <p class="card-text">Ver los empleados activos.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
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
