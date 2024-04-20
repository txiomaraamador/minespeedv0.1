@extends('layouts.app')

@section('title', 'Asignación de Vehículos a un Área')
@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Asignación de Vehículos a un Área</h2>
            <hr style="border-top: 2px solid #ee194f;">
            <form method="POST" action="{{ route('vehicle_areas.store') }}">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="areas_id" class="form-label">Seleccionar un Área:</label>
                        <select name="areas_id" id="areas_id" class="form-select" required="required">
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="topographic_information" class="form-label">Información Topográfica</label>
                        <input type="text" class="form-control" id="topographic_information" name="topographic_information" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="vehicles_id" class="form-label">Seleccionar Vehículo:</label>
                        <select name="vehicles_id" id="vehicles_id" class="form-select" required="required">
                            <option value="" disabled selected>Seleccionar vehículo</option> <!-- Mensaje predeterminado -->
                            @foreach($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}">{{ $vehicle->serial_number }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="plate" class="form-label">Placa</label>
                        <input type="text" class="form-control" id="plate" name="plate">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="make" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="make" name="make" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="model" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="model" name="model" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="manufacture" class="form-label">Manufactura</label>
                        <input type="text" class="form-control" id="manufacture" name="manufacture" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="tonnage" class="form-label">Carga</label>
                        <input type="text" class="form-control" id="tonnage" name="tonnage" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="typevehicles_id" class="form-label">Tipo de Vehículo</label>
                        <input type="text" class="form-control" id="typevehicles_id" name="typevehicles_id" readonly>
                    </div>
                </div>
                <br>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('vehicle_areas.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary" style="background-color: #ee194f; border-color: #ee194f; color: #fff;">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#areas_id').change(function() {
            var areaId = $(this).val();
            if (areaId) {
                $.ajax({
                    type: 'GET',
                    url: '/getAreaDetails/' + areaId,
                    success: function(response) {
                        if (response) {
                            $('#topographic_information').val(response.topographic_information);
                        }
                    }
                });
            }
        });

        $('#vehicles_id').change(function() {
            var vehicleId = $(this).val();
            if (vehicleId) {
                $.ajax({
                    type: 'GET',
                    url: '/getVehicleDetails/' + vehicleId,
                    success: function(response) {
                        if (response) {
                            $('#plate').val(response.plate);
                            $('#make').val(response.make);
                            $('#model').val(response.model);
                            $('#manufacture').val(response.manufacture);
                            $('#tonnage').val(response.tonnage);
                            $('#typevehicles_id').val(response.typevehicles_id);
                        }
                    }
                });
            }
        });
    });
</script>
<style>
    /* Estilo para los campos bloqueados */
    input[readonly] {
        background-color: #f5f5f5; /* Cambia el color de fondo a gris */
    }
</style>
@endsection
s