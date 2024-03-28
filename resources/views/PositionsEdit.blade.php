@extends('layouts.app')

@section('title', 'Area Edit')
@section('content')

<div class="container mt-5">
    <h2>Editar Cargo</h2>
    <form method="POST" action="{{ route('positions.update', $position->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $position->name }}">
        </div>
        
        <button type="submit" class="btn btn-primary" style="background-color: #ee194f;; border-color: #ee194f;; color: #fff;">Guardar Cambios</button>
    </form>
</div>

@endsection
