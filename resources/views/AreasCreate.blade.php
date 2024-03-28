@extends('layouts.app')

@section('title', 'Agregar Área')
@section('content')

<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Agregar Área</h2>
            <hr style="border-top: 2px solid #ee194f;">
            <form method="POST" action="{{ route('areas.store') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="topographic_information" class="form-label">Información Topográfica</label>
                    <input type="text" class="form-control" id="topographic_information" name="topographic_information">
                </div>

                <div class="row">
                    <div class="col-md-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" style="background-color: #ee194f;; border-color: #ee194f;; color: #fff;">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
