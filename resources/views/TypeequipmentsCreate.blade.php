@extends('layouts.app')

@section('title', 'Agregar Tipo de Equipo')
@section('content')

<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Agregar Tipo de Equipo</h2>
            <hr style="border-top: 2px solid #ee194f;">
            <form method="POST" action="{{ route('typeequipments.store') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="make" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="make" name="make">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>
                <div class="mb-3">
                    <label for="model" class="form-label">Modelo</label>
                    <input type="text" class="form-control" id="model" name="model">
                </div>
                
                <div class="row">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('typeequipments.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary" style="background-color: #ee194f;; border-color: #ee194f;; color: #fff;">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
