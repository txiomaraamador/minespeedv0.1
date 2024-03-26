@extends('layouts.app')

@section('title', 'Typeequipments Create')
@section('content')

<div class="container mt-5">
    <h2>Agregar Tipo de vehiculo</h2>
    <form method="POST" action="{{ route('typeequipments.store') }}">
        @csrf
        <div class="mb-3">
            <label for="make" class="form-label">Marca</label>
            <input type="text" class="form-control" id="make" name="make">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="model" name="model">
        </div>
       
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

@endsection