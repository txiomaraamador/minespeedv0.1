@extends('layouts.app')

@section('title', 'Area Edit')
@section('content')
<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Editar Cargo</h2>
            <hr style="border-top: 2px solid #ee194f;">

            <form method="POST" action="{{ route('positions.update', $position->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $position->name }}">
                </div>

                <div class="row mt-3">
                    <div class="col-md-12 d-flex justify-content-end">
                        <a href="{{ route('areas.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                        <button type="submit" class="btn btn-primary" style="background-color: #ee194f; border-color: #ee194f; color: #fff;">Guardar Cambios</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
