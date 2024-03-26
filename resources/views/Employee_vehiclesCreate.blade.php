@extends('layouts.app')

@section('title', 'employee_vehicle Create')
@section('content')

<div class="container mt-5">
    <h2>Asignacion de Vehiculos por Empleado</h2>
    <form method="POST" action="{{ route('employee_vehicles.store') }}">
        @csrf
        <div class="col-md-6">
            <label for="employees_id" class="form-label">Seleccionar Empleado:</label>
            <select name="employees_id" id="employees_id" class="form-select" required="required" placeholder="Elige un tipo de equipo" >
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
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
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

@endsection