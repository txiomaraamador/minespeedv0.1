@extends('layouts.app')

@section('title', 'Emails Create')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Agregar Correos para alertas</h2>
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
            <form method="POST" action="{{ route('emails.store') }}">
                @csrf
                
                <div class="row">
                    <div class="col-md-4">
                        <label for="info" class="form-label">Información:</label>
                        <div class="mb-3 input-group">
                            
                            <input type="text" class="form-control{{ $errors->has('info') ? ' is-invalid' : '' }}" id="info" name="info" required>
                            <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese la informacion del propietario del correo. Ejemplo: Empresa.">
                                <i class="bi bi-question-circle" style="opacity: 0.5;"></i>
                            </span>
                            @error('info')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="email" class="form-label">Correo:</label>
                        <div class="input-group">
                            
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" required>
                            <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese el correo. Ejemplo: example@example.com">
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
                        <label for="phone" class="form-label">Celular:</label>
                        <div class="mb-3 input-group">
                            
                            <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone" name="phone" required>
                            <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese el número con lada del país. Ejemplo: +524331131492 ">
                                <i class="bi bi-question-circle" style="opacity: 0.5;"></i>
                            </span>
                            @error('phone')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('emails.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary" style="background-color: #ee194f; border-color: #ee194f; color: #fff;">Guardar</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
