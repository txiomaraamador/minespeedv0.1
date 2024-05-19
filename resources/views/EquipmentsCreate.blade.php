@extends('layouts.app')

@section('title', 'Equipos Create')
@section('content')

<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Agregar Equipos</h2>
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
            <form method="POST" action="{{ route('equipments.store') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="number" class="form-label">No. de camara</label>
                    <input type="text" class="form-control" id="number" name="number">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="typeequipments_id" class="form-label">Tipo de equipo:</label>
                        <select name="typeequipments_id" id="typeequipments_id" class="form-select" required="required" placeholder="Elige un tipo de equipo" >
                            <option value="" disabled selected>Seleccionar equipo</option> <!-- Mensaje predeterminado -->
                            @foreach($typeequipments as $typeequipment)
                                <option value="{{ $typeequipment->id }}">{{ $typeequipment->description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="areas_id" class="form-label">Área donde se encuentra</label>
                        <select name="areas_id" id="areas_id" class="form-select" required="required" placeholder="Elige un área" >
                            <option value="" disabled selected>Seleccionar área</option> <!-- Mensaje predeterminado -->
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
<br>
                <div class="row">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('equipments.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary" style="background-color: #ee194f;; border-color: #ee194f;; color: #fff;">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
