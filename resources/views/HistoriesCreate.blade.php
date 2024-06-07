@extends('layouts.app')

@section('title', 'Histories Create')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Registrar alerta</h2>
            @if(session('error'))
            <div id="alert" class="alert alert-danger">
                {{ session('error') }}
            </div>
@endif

            @if(session('success'))
                <div id="alert" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <script>
                // Código JavaScript para ocultar la alerta después de unos segundos
                setTimeout(function(){
                    var alert = document.getElementById('alert');
                    if(alert) {
                        alert.style.display = 'none';
                    }
                }, 3000); // La alerta se ocultará después de 5 segundos (5000 milisegundos)
            </script>
            <hr style="border-top: 2px solid #ee194f;">
            <form method="POST" action="{{ route('histories.store') }}">
                @csrf
                <input type="hidden" name="reports_id" value="{{ $id }}">
                <div class="row">
                    <div class="col-md-4">
                        <label for="date" class="form-label">Fecha</label>
                        <div class="mb-3 input-group">
                            
                            <input type="text" pattern="[0-9]*" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="message" class="form-label">Mensaje</label>
                        <div class="mb-3 input-group">
                            
                            <input type="text" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" id="message" name="message" value="Mensaje de alerta" readonly>
                           
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="speed" class="form-label">Velocidad</label>
                        <div class="mb-3 input-group">
                            
                            <input type="text" class="form-control{{ $errors->has('speed') ? ' is-invalid' : '' }}" id="speed" name="speed" value="{{ $speed }} km/h" readonly>
                            
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="photo" class="form-label">Fotografia del vehiculo</label>
                        <div class="mb-3 input-group">
                            <input type="text" value="\{{$output}}" hidden=true name="photo"></input> <img src="\{{$output}}" width="345" >                     
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="equipments_id" class="form-label">IP camara</label>
                        <div class="mb-3 input-group">
                            <input type="text" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}"  value="{{ $camera_ip }}" id="number" name="number" readonly>
                        </div>
                        
                    </div>
                    <div class="col-md-4">
                        <label for="plate" class="form-label">Ingrese la placa</label>
                        <div class="mb-3 input-group">
                            <input type="text" class="form-control{{ $errors->has('plate') ? ' is-invalid' : '' }}"  id="plate" name="plate" required>
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
                            <input type="text" class="form-control" id="typevehicles_id" name="typevehicles_id" readonly>
                            
                        </div>
                    </div>




                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="identification_number" class="form-label">No. Identificación</label>
                            <input type="text" class="form-control" id="identification_number" name="identification_number" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="employees_id" class="form-label">Empleado</label>
                            <input type="text" class="form-control" id="name" name="name" readonly>
                          

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
                            <label for="positions_id" class="form-label">Zona:</label>
                            <input type="text"  class="form-control" name="zona" value="{{ $zona }}" readonly >
                        </div>
                    </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('histories.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary" style="background-color: #ee194f; border-color: #ee194f; color: #fff;">Guardar</button>
                </div>

            </form>
        </div>
    </div>
</div>

<style>
    /* Estilo para los campos bloqueados */
    input[readonly] {
        background-color: #f5f5f5; /* Cambia el color de fondo a gris */
    }
</style>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#plate').change(function() {
                var plate = $(this).val();
                if (plate) {
                    $.ajax({
                        type: 'GET',
                        url: '/getVechileDetails/' + plate,
                        success: function(response) {
                            if (response) {
                                $('#serial_number').val(response.serial_number);
                                $('#make').val(response.make);
                                $('#model').val(response.model);
                                $('#manufacture').val(response.manufacture);
                                $('#tonnage').val(response.tonnage);
                                $('#typevehicles_id').val(response.typevehicles_id);

                                $('#identification_number').val(response.identification_number);
                                $('#name').val(response.name);
                                
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
    </script>

@endsection
