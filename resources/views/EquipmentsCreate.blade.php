@extends('layouts.app')

@section('title', 'equipments Create')
@section('content')

<div class="container mt-5">
    <h2>Agregar Equipos</h2>
    <form method="POST" action="{{ route('equipments.store') }}">
        @csrf
        
        <div class="mb-3">
            <label for="number" class="form-label">No. de camara</label>
            <input type="text" class="form-control" id="number" name="number">
        </div>
        <div class="col-md-6">
            <label for="typeequipments_id" class="form-label">Tipo de vehiculo:</label>
            <select name="typeequipments_id" id="typeequipments_id" class="form-select" required="required" placeholder="Elige un tipo de equipo" >
                @foreach($typeequipments as $typeequipment)
                    <option value="{{ $typeequipment->id }}">{{ $typeequipment->description }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="areas_id" class="form-label">Area donde se encuentra</label>
            <select name="areas_id" id="areas_id" class="form-select" required="required" placeholder="Elige un area" >
                @foreach($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" style="background-color: #ee194f;; border-color: #ee194f;; color: #fff;">Guardar</button>
    </form>
</div>

@endsection