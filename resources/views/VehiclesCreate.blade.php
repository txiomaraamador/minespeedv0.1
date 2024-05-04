@extends('layouts.app')

@section('title', 'Vehicles Create')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Agregar Vehículo</h2>
            <hr style="border-top: 2px solid #ee194f;">
            <form method="POST" action="{{ route('vehicles.store') }}">
                @csrf
                
                <div class="row">
                    <div class="col-md-4">
                        <label for="serial_number" class="form-label">No. de serie</label>
                        <div class="mb-3 input-group">
                            
                            <input type="text" pattern="[0-9]*" class="form-control{{ $errors->has('serial_number') ? ' is-invalid' : '' }}" id="serial_number" name="serial_number" required>
                            <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese el numero de serie del vehiculo, solo se aceptan numeros.">
                                <i class="bi bi-question-circle" style="opacity: 0.5;"></i>
                            </span>
                            @error('serial_number')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="make" class="form-label">Marca</label>
                        <div class="mb-3 input-group">
                            
                            <input type="text" class="form-control{{ $errors->has('make') ? ' is-invalid' : '' }}" id="make" name="make" required>
                            <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese el numero de serie del vehiculo, solo se aceptan numeros.">
                                <i class="bi bi-question-circle" style="opacity: 0.5;"></i>
                            </span>
                            @error('make')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="model" class="form-label">Modelo</label>
                        <div class="mb-3 input-group">
                            
                            <input type="text" class="form-control{{ $errors->has('model') ? ' is-invalid' : '' }}" id="model" name="model" required>
                            <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese el numero de serie del vehiculo, solo se aceptan numeros.">
                                <i class="bi bi-question-circle" style="opacity: 0.5;"></i>
                            </span>
                            @error('model')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="manufacture" class="form-label">Manufactura</label>
                        <div class="mb-3 input-group">
                           
                            <input type="text" class="form-control{{ $errors->has('manufacture') ? ' is-invalid' : '' }}" id="manufacture" name="manufacture" required>
                            <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese el numero de serie del vehiculo, solo se aceptan numeros.">
                                <i class="bi bi-question-circle" style="opacity: 0.5;"></i>
                            </span>
                            @error('manufacture')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="plate" class="form-label">Placa</label>
                        <div class="mb-3 input-group">
                            
                            <input type="text" class="form-control{{ $errors->has('plate') ? ' is-invalid' : '' }}" id="plate" name="plate" required>
                            <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese el numero de serie del vehiculo, solo se aceptan numeros.">
                                <i class="bi bi-question-circle" style="opacity: 0.5;"></i>
                            </span>
                            @error('plate')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="tonnage" class="form-label">Carga</label>
                        <div class="mb-3 input-group" >
                          
                            <input type="text" class="form-control{{ $errors->has('tonnage') ? ' is-invalid' : '' }}" id="tonnage" name="tonnage" required>
                            <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese el numero de serie del vehiculo, solo se aceptan numeros.">
                                <i class="bi bi-question-circle" style="opacity: 0.5;"></i>
                            </span>
                            @error('tonnage')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 ">
                            <label for="typevehicles_id" class="form-label">Tipo de vehiculo:</label>
                            <select name="typevehicles_id" id="typevehicles_id" class="form-select{{ $errors->has('typevehicles_id') ? ' is-invalid' : '' }}" required>
                                <option value="" disabled selected>Seleccionar tipo de vehiculo</option> <!-- Mensaje predeterminado -->
                                @foreach($typevehicles as $typevehicle)
                                    <option value="{{ $typevehicle->id }}">{{ $typevehicle->name }}</option>
                                @endforeach
                            </select>
                            @error('typevehicles_id')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary" style="background-color: #ee194f; border-color: #ee194f; color: #fff;">Guardar</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
