@extends('layouts.app')

@section('title', 'Agregar Cargo')
@section('content')

<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Agregar Cargo</h2>
            <hr style="border-top: 2px solid #ee194f;">
            <form method="POST" action="{{ route('positions.store') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                
                <div class="row">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('positions.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary" style="background-color: #ee194f;; border-color: #ee194f;; color: #fff;">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
