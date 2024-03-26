@extends('layouts.app')

@section('title', 'Area Edit')
@section('content')

<div class="container mt-5">
    <h2>Editar Area</h2>
    <form method="POST" action="{{ route('areas.update', $area->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $area->name }}">
        </div>
        <div class="mb-3">
            <label for="topographic_information" class="form-label">Información Topográfica</label>
            <input type="text" class="form-control" id="topographic_information" name="topographic_information" value="{{ $area->topographic_information }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>

@endsection
