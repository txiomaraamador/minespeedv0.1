@extends('layouts.app')

@section('title', 'Area Edit')
@section('content')
<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Editar Área</h2>
            <hr style="border-top: 2px solid #ee194f;">
            <form method="POST" action="{{ route('areas.update', $area->id) }}">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $area->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="topographic_information" class="form-label">Información Topográfica</label>
                            <input type="text" class="form-control" id="topographic_information" name="topographic_information" value="{{ $area->topographic_information }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" style="background-color: #ee194f; border-color: #ee194f; color: #fff;">Guardar Cambios</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
