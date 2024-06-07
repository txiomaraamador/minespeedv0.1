@extends('layouts.app')

@section('title', 'Agregar Área')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Agregar Área</h2>
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
            <form method="POST" action="{{ route('areas.store') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" required>
                    @error('name')
                    <div class="invalid-feedback" style="color: red;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <label for="topographic_information" class="form-label">Información Topográfica</label>
                <div class="mb-3 input-group">
                    
                    <input type="text" class="form-control{{ $errors->has('topographic_information') ? ' is-invalid' : '' }}" id="topographic_information" name="topographic_information" required>
                    <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese cualquier informacion para identificar el area, solo acepta un max de 255 caracteres.">
                        <i class="bi bi-question-circle" style="opacity: 0.5;"></i>
                    </span>
                    @error('topographic_information')
                    <div class="invalid-feedback" style="color: red;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('areas.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary mr-2" style="background-color: #ee194f; border-color: #ee194f; color: #fff;">Guardar</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>

@endsection
