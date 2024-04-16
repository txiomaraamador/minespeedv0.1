@extends('layouts.app')

@section('title', 'Typeequipments Edit')
@section('content')

<div class="container mt-5">
    <h2>Editar Tipo de Equipo</h2>
    <form method="POST" action="{{ route('typeequipments.update', $typeequipment->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="make" class="form-label">Marca</label>
            <input type="text" class="form-control" id="make" name="make" value="{{ $typeequipment->make }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $typeequipment->description }}">
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ $typeequipment->model }}">
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('typeequipments.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary" style="background-color: #ee194f;; border-color: #ee194f;; color: #fff;">Guardar Cambios</button>
        </div>
    </form>
</div>

@endsection