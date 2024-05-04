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
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" required>
                    @error('name')
                    <div class="invalid-feedback" style="color: red;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="topographic_information" class="form-label">Información Topográfica</label>
                    <input type="text" class="form-control{{ $errors->has('topographic_information') ? ' is-invalid' : '' }}" id="topographic_information" name="topographic_information" required>
                    @error('topographic_information')
                    <div class="invalid-feedback" style="color: red;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('areas.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary mr-2" style="background-color: #ee194f; border-color: #ee194f; color: #fff;">Guardar</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>

@endsection
