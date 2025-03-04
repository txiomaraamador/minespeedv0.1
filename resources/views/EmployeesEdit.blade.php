
@extends('layouts.app')

@section('title', 'Employees Edit')
@section('content')

<div class="container mt-5">
    <h2>Editar Empleado</h2>
    <form method="POST" action="{{ route('employees.update', $employee->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="identification_number" class="form-label">No. Identificacion</label>
            <input type="text" class="form-control" id="identification_number" name="identification_number" value="{{ $employee->identification_number }}">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $employee->lastname }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $employee->email }}">
        </div>
        <div class="mb-3">
            <label for="license" class="form-label">Licencia</label>
            <input type="text" class="form-control" id="license" name="license" value="{{ $employee->license }}">
        </div>
        <div class="col-md-6">
            <label for="positions_id" class="form-label">Cargo:</label>
            <select name="positions_id" id="positions_id" class="form-select" required="required" placeholder="Elige un Cargo" value="{{ $employee->positions_id }}">
                @foreach($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>

@endsection
