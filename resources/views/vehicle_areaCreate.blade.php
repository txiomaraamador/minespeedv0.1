@extends('layouts.app')

@section('title', 'vehicle_area Create')
@section('content')

<div class="container mt-5">
    <h2>Asignacion de Vehiculos a un Area</h2>
    <form method="POST" action="{{ route('vehicle_areas.store') }}">
        @csrf
        <div class="col-md-6">
            <label for="areas_id" class="form-label">Seleccionar un Area:</label>
            <select name="areas_id" id="areas_id" class="form-select" required="required" placeholder="Elige un Area" >
                @foreach($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="vehicles_id" class="form-label">Seleccionar Vehiculo:</label>
            <select name="vehicles_id" id="vehicles_id" class="form-select" required="required" placeholder="Elige un area" >
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->serial_number }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" style="background-color: #ee194f;; border-color: #ee194f;; color: #fff;">Guardar</button>
    </form>
</div>

@endsection