@extends('layouts.app')

@section('title', 'Employees Edit')
@section('content')
<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Editar Empleado</h2>
            <hr style="border-top: 2px solid #ee194f;">
            <form method="POST" action="{{ route('employees.update', $employee->id) }}">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="identification_number" class="form-label">No. Identificación</label>
                            <input type="text" class="form-control" id="identification_number" name="identification_number" value="{{ $employee->identification_number }}">
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
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ $employee->email }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="license" class="form-label">Licencia</label>
                            <input type="text" class="form-control" id="license" name="license" value="{{ $employee->license }}">
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
                    <div class="col-md-12 d-flex justify-content-end">
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
