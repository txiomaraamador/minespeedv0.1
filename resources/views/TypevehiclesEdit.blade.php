@extends('layouts.app')

@section('title', 'Typevehicles Edit')
@section('content')

<div class="container mt-5">
    <h2>Editar Tipo de vehiculo</h2>
    <form method="POST" action="{{ route('typevehicles.update', $typevehicle->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $typevehicle->name }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>

@endsection