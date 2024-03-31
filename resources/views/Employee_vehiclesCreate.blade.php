@extends('layouts.app')

@section('title', 'Asignación de Vehículos por Empleado')
@section('content')
<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Asignación de Vehículos por Empleado</h2>
            <hr style="border-top: 2px solid #ee194f;">
            <form method="POST" action="{{ route('employee_vehicles.store') }}">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="identification_number" class="form-label">No. Identificación</label>
                        <input type="text" class="form-control" id="identification_number" name="identification_number">
                    </div>
                    <div class="col-md-4">
                        <label for="employees_id" class="form-label">Seleccionar Empleado:</label>
                        <select name="employees_id" id="employees_id" class="form-select" required="required">
                            <option value="" disabled selected>Seleccionar empleado</option> 
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }} {{ $employee->lastname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="text" class="form-control" id="email" name="email" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="license" class="form-label">Licencia</label>
                        <input type="text" class="form-control" id="license" name="license" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="positions_id" class="form-label">Cargo:</label>
                        <input type="text"  class="form-control" id="positions_id" name="positions_id" readonly >
                    </div>
                    <div class="col-md-4">
                        <label for="vehicles_id" class="form-label">No. de Vehículo:</label>
                        <select name="vehicles_id" id="vehicles_id" class="form-select" required="required">
                            <option value="" disabled selected>Seleccionar Vehiculo</option> <!-- Mensaje predeterminado -->
                            @foreach($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}">{{ $vehicle->serial_number }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="plate" class="form-label">Placa</label>
                        <input type="text" class="form-control" id="plate" name="plate">
                    </div>
                    <div class="col-md-4">
                        <label for="make" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="make" name="make" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="model" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="model" name="model" readonly>
                    </div>
                    
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="manufacture" class="form-label">Manufactura</label>
                        <input type="text" class="form-control" id="manufacture" name="manufacture" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="tonnage" class="form-label">Carga</label>
                        <input type="text" class="form-control" id="tonnage" name="tonnage" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="typevehicles_id" class="form-label">Tipo de Vehículo:</label>
                        <input type="text" class="form-control" id="typevehicles_id" name="typevehicles_id" >
                        
                    </div>
                </div>

                <div class="col-md-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary" style="background-color: #ee194f; border-color: #ee194f; color: #fff;">Guardar</button>
                </div>            
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#employees_id').change(function() {
                var employeeId = $(this).val();
                if (employeeId) {
                    $.ajax({
                        type: 'GET',
                        url: '/getEmployeeDetails/' + employeeId,
                        success: function(response) {
                            if (response) {
                                $('#identification_number').val(response.identification_number);
                                $('#email').val(response.email);
                                $('#license').val(response.license);
                                $('#positions_id').val(response.positions_id);

                                // Llena otros campos aquí con la respuesta obtenida
                            }
                        }
                    });
                }
            });
        });
        $(document).ready(function() {
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


                                // Llena otros campos aquí con la respuesta obtenida
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

