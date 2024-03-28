@extends('layouts.app')

@section('title', 'Employees Create')
@section('content')

<div class="container mt-5">
    <h2>Agregar Empleado</h2>
    <form method="POST" action="{{ route('employees.store') }}">
        @csrf
        
        <div class="mb-3">
            <label for="identification_number" class="form-label">No. Identificacion</label>
            <input type="text" class="form-control" id="identification_number" name="identification_number">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electronico</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="license" class="form-label">Licencia</label>
            <input type="text" class="form-control" id="license" name="license">
        </div>
        <div class="col-md-6">
            <label for="positions_id" class="form-label">Cargo:</label>
            <select name="positions_id" id="positions_id" class="form-select" required="required" placeholder="Elige un Cargo" >
                @foreach($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" style="background-color: #ee194f;; border-color: #ee194f;; color: #fff;">Guardar</button>
    </form>
</div>

@endsection