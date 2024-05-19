@extends('layouts.app')

@section('title', 'Employees Edit')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Editar Empleado</h2>
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
            <form method="POST" action="{{ route('employees.update', $employee->id) }}">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-4">
                        <label for="identification_number" class="form-label">No. Identificacion</label>
                        <div class="mb-3 input-group">
                            
                            <input type="text" class="form-control{{ $errors->has('identification_number') ? ' is-invalid' : '' }}" id="identification_number" name="identification_number" value="{{ $employee->identification_number }}">
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
                            <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $employee->lastname }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <div class="mb-3 input-group">   
                            <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ $employee->email }}">
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
                    <div class="col-md-4">
                        <label for="license" class="form-label">Licencia</label>
                        <div class="mb-3 input-group" >
                            <input type="text" class="form-control{{ $errors->has('license') ? ' is-invalid' : '' }}" id="license" name="license" value="{{ $employee->license }}">
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
                    <div class="col-md-4">
                        <label for="positions_id" class="form-label">Cargo:</label>
                        <select name="positions_id" id="positions_id" class="form-select" required="required" >
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}" {{ $employee->positions_id === $position->id ? 'selected' : '' }}>{{ $position->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">


                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" value="activo" name="status" id="flexCheckActivo" {{ $employee->status === 'activo' ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckActivo">
                                    Activo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="inactivo" name="status" id="flexCheckInactivo" {{ $employee->status === 'inactivo' ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckInactivo">
                                    Inactivo
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary" style="background-color: #ee194f; border-color: #ee194f; color: #fff;">Guardar Cambios</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // Obtener referencias a los checkboxes
    const checkboxActivo = document.getElementById('flexCheckActivo');
    const checkboxInactivo = document.getElementById('flexCheckInactivo');

    // Agregar event listeners para detectar cambios en los checkboxes
    checkboxActivo.addEventListener('change', function() {
        if (this.checked) {
            checkboxInactivo.checked = false; // Desmarca el checkbox inactivo si se marca el activo
            guardarEstadoEnBaseDeDatos('activo');
        }
    });

    checkboxInactivo.addEventListener('change', function() {
        if (this.checked) {
            checkboxActivo.checked = false; // Desmarca el checkbox activo si se marca el inactivo
            guardarEstadoEnBaseDeDatos('inactivo');
        }
    });

    // Función para enviar el estado al backend
    function guardarEstadoEnBaseDeDatos(estado) {
        // Aquí puedes hacer una solicitud HTTP al backend para guardar el estado en la base de datos
        console.log('Guardando estado en la base de datos:', estado);
        // Por ejemplo, puedes usar fetch() o cualquier otra biblioteca de tu elección para enviar los datos al backend
    }
</script>
@endsection
