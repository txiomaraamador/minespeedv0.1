@extends('layouts.app')

@section('title', 'Area Create')
@section('content')

<div class="container mt-5">
    <h2>Agregar Area</h2>
    <form method="POST" action="{{ route('areas.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="topographic_information" class="form-label">Informacion Topografica</label>
            <input type="text" class="form-control" id="topographic_information" name="topographic_information">
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #ee194f;; border-color: #ee194f;; color: #fff;">Guardar</button>
    </form>
</div>

@endsection