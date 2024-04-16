@extends('layouts.app')

@section('title', 'Vehicles Edit')
@section('content')
<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Editar Vehículo</h2>
            <hr style="border-top: 2px solid #ee194f;">

            <form method="POST" action="{{ route('vehicles.update', $vehicle->id) }}">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="serial_number" class="form-label">No. de serie</label>
                            <input type="text" class="form-control" id="serial_number" name="serial_number" value="{{ $vehicle->serial_number }}">
                        </div>
                        <div class="mb-3">
                            <label for="make" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="make" name="make" value="{{ $vehicle->make }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="model" class="form-label">Modelo</label>
                            <input type="text" class="form-control" id="model" name="model" value="{{ $vehicle->model }}">
                        </div>
                        <div class="mb-3">
                            <label for="manufacture" class="form-label">Manufactura</label>
                            <input type="text" class="form-control" id="manufacture" name="manufacture" value="{{ $vehicle->manufacture }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="plate" class="form-label">Placa</label>
                            <input type="text" class="form-control" id="plate" name="plate" value="{{ $vehicle->plate }}">
                        </div>
                        <div class="mb-3">
                            <label for="tonnage" class="form-label">Carga</label>
                            <input type="text" class="form-control" id="tonnage" name="tonnage" value="{{ $vehicle->tonnage }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                        <label for="typevehicles_id" class="form-label">Tipo de vehículo:</label>
                        <select name="typevehicles_id" id="typevehicles_id" class="form-select" required="required">
                            @foreach($typevehicles as $typevehicle)
                                <option value="{{ $typevehicle->id }}" {{ $vehicle->typevehicles_id === $typevehicle->id ? 'selected' : '' }}>{{ $typevehicle->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12 d-flex justify-content-end">
                        <a href="{{ route('areas.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                        <button type="submit" class="btn btn-primary" style="background-color: #ee194f; border-color: #ee194f; color: #fff;">Guardar Cambios</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
