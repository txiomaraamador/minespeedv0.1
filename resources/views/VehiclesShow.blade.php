@extends('layouts.app')

@section('title', 'Vehicle Show')

@section('content')
<br>
<div class="container">
    <!-- Información del Vehículo -->
    <div class="card mb-4">
        <div class="card-header" style="background-color: #ee194f; color: white;"> <!-- Cambiado a rosa -->
            Información de Vehículo número: {{ $vehicle->serial_number }}, con placa: {{ $vehicle->plate }}
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Marca: {{ $vehicle->make }}, Modelo: {{ $vehicle->model }}, Manufactura: {{ $vehicle->manufacture }}</li>
                <li class="list-group-item">Tipo de vehículo: {{ $vehicle->nametypevehicle->name}}, Carga: {{ $vehicle->tonnage }}</li>
            </ul>
        </div>
    </div>
    <!-- Información del Conductor -->
    <div class="card mb-4">
        <div class="card-header" style="background-color: #ee194f; color: white;">
            Información del Conductor del Vehículo
        </div>
        <div class="card-body">
            @foreach($employees as $employee)
                <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item">No de Identificación: {{ $employee->identification_number }}</li>
                    <li class="list-group-item">Nombre: {{ $employee->name }} {{ $employee->lastname }}</li>
                    <li class="list-group-item">Correo: {{ $employee->email }}</li>
                    <li class="list-group-item">No. de Licencia: {{ $employee->license }}</li>
                    <li class="list-group-item">Cargo: {{ $employee->nameposition->name }}</li>
                </ul>
            @endforeach
        </div>
    </div>
    <!-- Información del Área -->
    <div class="card mb-4">
        <div class="card-header" style="background-color: #ee194f; color: white;">
            Información del Área Donde se Encuentra
        </div>
        <div class="card-body">
            @foreach($areas as $area)
                <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item">Nombre: {{ $area->name }}</li>
                    <li class="list-group-item">Información Topográfica: {{ $area->topographic_information }}</li>
                </ul>
            @endforeach
        </div>
    </div>
</div>
<br>
@endsection
