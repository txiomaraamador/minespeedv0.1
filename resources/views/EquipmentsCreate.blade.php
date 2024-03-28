@extends('layouts.app')

@section('title', 'Equipos Create')
@section('content')

<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Agregar Equipos</h2>
            <hr style="border-top: 2px solid #ee194f;">
            <form method="POST" action="{{ route('equipments.store') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="number" class="form-label">No. de camara</label>
                    <input type="text" class="form-control" id="number" name="number">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="typeequipments_id" class="form-label">Tipo de equipo:</label>
                        <select name="typeequipments_id" id="typeequipments_id" class="form-select" required="required" placeholder="Elige un tipo de equipo" >
                            @foreach($typeequipments as $typeequipment)
                                <option value="{{ $typeequipment->id }}">{{ $typeequipment->description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="areas_id" class="form-label">Área donde se encuentra</label>
                        <select name="areas_id" id="areas_id" class="form-select" required="required" placeholder="Elige un área" >
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
<br>
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
