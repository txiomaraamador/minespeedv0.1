@extends('layouts.app')

@section('title', 'Vehicles Create')
@section('content')

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
                        <div class="mb-3">
                            <label for="serial_number" class="form-label">No. de serie</label>
                            <input type="text" class="form-control" id="serial_number" name="serial_number">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="make" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="make" name="make">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="model" class="form-label">Modelo</label>
                            <input type="text" class="form-control" id="model" name="model">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="manufacture" class="form-label">Manufactura</label>
                            <input type="text" class="form-control" id="manufacture" name="manufacture">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="plate" class="form-label">Placa</label>
                            <input type="text" class="form-control" id="plate" name="plate">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="tonnage" class="form-label">Carga</label>
                            <input type="text" class="form-control" id="tonnage" name="tonnage">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="typevehicles_id" class="form-label">Tipo de vehiculo:</label>
                            <select name="typevehicles_id" id="typevehicles_id" class="form-select" required="required" placeholder="Elige un tipo de vehiculo">
                                @foreach($typevehicles as $typevehicle)
                                    <option value="{{ $typevehicle->id }}">{{ $typevehicle->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary" style="background-color: #ee194f; border-color: #ee194f; color: #fff;">Guardar</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
