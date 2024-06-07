@extends('layouts.app')

@section('title', 'Historial Show')

@section('content')
<br>
<div class="container">

    <div class="card mb-4">
        <div class="card-header" style="background-color: #ee194f; color: white;"> <!-- Cambiado a rosa -->
            Alerta registrada en {{ $area->name }} por cámara: {{ $equipment->number }} con fecha {{ $histories->date}}
        </div>
        <div class="card-body">
            <img src="{{ $histories->photo }}" width="345" > 
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header" style="background-color: #ee194f; color: white;"> <!-- Cambiado a rosa -->
            Información de Vehículo número: {{ $vehicle->serial_number }}, con placa: {{ $vehicle->plate }}
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Marca: {{ $vehicle->make }}, Modelo: {{ $vehicle->model }}, Manufactura: {{ $vehicle->manufacture }}</li>
                <li class="list-group-item">Tipo de vehículo: {{ $vehicle->nametypevehicle->name}}, Carga: {{ $vehicle->tonnage }}</li>
                <li class="list-group-item">Velocidad registrada por encima del límite: {{ $histories->speed}}</li>
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="card-header" style="background-color: #ee194f; color: white;"> <!-- Cambiado a rosa -->
            Conductor a cargo: {{ $employee->name }} {{ $employee->lastname }}, con número de identificación: {{ $employee->identification_number }}
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Correo: {{ $employee->email }}</li>
                <li class="list-group-item">No. de Licencia: {{ $employee->license }}</li>
                <li class="list-group-item">Cargo: {{ $position->name}}</li>
            </ul>
        </div>
    </div>
</div>
<br>
@endsection
