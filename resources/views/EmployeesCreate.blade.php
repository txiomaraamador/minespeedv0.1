@extends('layouts.app')

@section('title', 'Employees Create')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Agregar Empleado</h2>
            <hr style="border-top: 2px solid #ee194f;">
            <form method="POST" action="{{ route('employees.store') }}">
                @csrf
                
                <div class="row">
                    <div class="col-md-4">
                        <label for="identification_number" class="form-label">No. Identificacion</label>
                        <div class="mb-3 input-group">
                            
                            <input type="text" class="form-control{{ $errors->has('identification_number') ? ' is-invalid' : '' }}" id="identification_number" name="identification_number" required>
                            <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese en numero de identificacion de su empleado. Solo se aceptan numeros ">
                                <i class="bi bi-question-circle" style="opacity: 0.5;"></i>
                            </span>
                            @error('identification_number')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" required>
                            @error('name')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Apellido</label>
                            <input type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" id="lastname" name="lastname" required>
                            
                            @error('lastname')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <div class="mb-3 input-group">    
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" required>
                            <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese el correo de su empleado. Ejemplo: example@example.com">
                                <i class="bi bi-question-circle" style="opacity: 0.5;"></i>
                            </span>
                            @error('email')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="license" class="form-label">Licencia</label>
                        <div class="mb-3 input-group" >
                            <input type="text" class="form-control{{ $errors->has('license') ? ' is-invalid' : '' }}" id="license" name="license" required>
                            <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese la licencia de manejo.">
                                <i class="bi bi-question-circle" style="opacity: 0.5;"></i>
                            </span>
                            @error('license')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="positions_id" class="form-label">Cargo:</label>
                        <select name="positions_id" id="positions_id" class="form-select{{ $errors->has('positions_id') ? ' is-invalid' : '' }}" required>
                            <option value="" disabled selected>Seleccionar cargo</option> <!-- Mensaje predeterminado -->
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                        </select>
                        @error('positions_id')
                        <div class="invalid-feedback" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary" style="background-color: #ee194f; border-color: #ee194f; color: #fff;">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
