
@extends('layouts.app')

@section('title', 'Vehicles Edit')
@section('content')

<div class="container mt-5">
    <h2>Editar Vehiculo</h2>
    <form method="POST" action="{{ route('vehicles.update', $vehicle->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="serial_number" class="form-label">No. de serie</label>
            <input type="text" class="form-control" id="serial_number" name="serial_number" value="{{ $vehicle->serial_number }}">
        </div>
        <div class="mb-3">
            <label for="make" class="form-label">Marca</label>
            <input type="text" class="form-control" id="make" name="make" value="{{ $vehicle->make }}">
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ $vehicle->model }}">
        </div>
        <div class="mb-3">
            <label for="manufacture" class="form-label">Manufactura</label>
            <input type="text" class="form-control" id="manufacture" name="manufacture" value="{{ $vehicle->manufacture }}">
        </div>
        <div class="mb-3">
            <label for="plate" class="form-label">Placa</label>
            <input type="text" class="form-control" id="plate" name="plate" value="{{ $vehicle->plate }}">
        </div>
        <div class="mb-3">
            <label for="tonnage" class="form-label">Carga</label>
            <input type="text" class="form-control" id="tonnage" name="tonnage" value="{{ $vehicle->tonnage }}">
        </div>
        <div class="col-md-6">
            <label for="typevehicles_id" class="form-label">Tipo de vehiculo:</label>
            <select name="typevehicles_id" id="typevehicles_id" class="form-select" required="required" placeholder="Elige un tipo de vehiculo" value="{{ $vehicle->typevehicles_id }}">
                @foreach($typevehicles as $typevehicle)
                    <option value="{{ $typevehicle->id }}">{{ $typevehicle->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>

@endsection
