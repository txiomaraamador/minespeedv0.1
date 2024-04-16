@extends('layouts.app')

@section('title', 'Typeequipments Edit')
@section('content')
<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Editar Tipo de Equipo</h2>
            <hr style="border-top: 2px solid #ee194f;">

            <form method="POST" action="{{ route('typeequipments.update', $typeequipment->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="make" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="make" name="make" value="{{ $typeequipment->make }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ $typeequipment->description }}">
                </div>
                <div class="mb-3">
                    <label for="model" class="form-label">Modelo</label>
                    <input type="text" class="form-control" id="model" name="model" value="{{ $typeequipment->model }}">
                </div>

                <div class="row mt-3">
                    <div class="col-md-12 d-flex justify-content-end">
                        <a href="{{ route('typeequipments.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                        <button type="submit" class="btn btn-primary" style="background-color: #ee194f; border-color: #ee194f; color: #fff;">Guardar Cambios</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
