@extends('layouts.app')

@section('title', 'Vehicles Create')
@section('content')

<div class="container mt-5">
    <h2>Agregar Vehiculos</h2>
    <form method="POST" action="{{ route('vehicles.store') }}">
        @csrf
        
        <div class="mb-3">
            <label for="serial_number" class="form-label">No. de serie</label>
            <input type="text" class="form-control" id="serial_number" name="serial_number">
        </div>
        <div class="mb-3">
            <label for="make" class="form-label">Marca</label>
            <input type="text" class="form-control" id="make" name="make">
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="model" name="model">
        </div>
        <div class="mb-3">
            <label for="manufacture" class="form-label">Manufactura</label>
            <input type="text" class="form-control" id="manufacture" name="manufacture">
        </div>
        <div class="mb-3">
            <label for="plate" class="form-label">Placa</label>
            <input type="text" class="form-control" id="plate" name="plate">
        </div>
        <div class="mb-3">
            <label for="tonnage" class="form-label">Carga</label>
            <input type="text" class="form-control" id="tonnage" name="tonnage">
        </div>
        <div class="col-md-6">
            <label for="typevehicles_id" class="form-label">Tipo de vehiculo:</label>
            <select name="typevehicles_id" id="typevehicles_id" class="form-select" required="required" placeholder="Elige un tipo de vehiculo" >
                @foreach($typevehicles as $typevehicle)
                    <option value="{{ $typevehicle->id }}">{{ $typevehicle->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" style="background-color: #ee194f;; border-color: #ee194f;; color: #fff;">Guardar</button>
    </form>
</div>

@endsection