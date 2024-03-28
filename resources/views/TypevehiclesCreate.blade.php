@extends('layouts.app')

@section('title', 'Typevehicles Create')
@section('content')

<div class="container mt-5">
    <h2>Agregar Tipo de vehiculo</h2>
    <form method="POST" action="{{ route('typevehicles.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
       
        <button type="submit" class="btn btn-primary" style="background-color: #ee194f;; border-color: #ee194f;; color: #fff;">Guardar</button>
    </form>
</div>

@endsection