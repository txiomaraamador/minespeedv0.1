@extends('layouts.app')

@section('title', 'Equipment Show')

@section('content')
<br>
<div class="container">
    <!-- Información del Equipo -->
    <div class="card mb-4">
        <div class="card-header" style="background-color: #ee194f; color: white;">
            Información del Equipo No: {{ $equipment->number }}
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Marca: {{ $equipment->nametypeequipment->make }}</li>
                <li class="list-group-item">Modelo: {{ $equipment->nametypeequipment->model }}</li>
                <li class="list-group-item">Descripción: {{ $equipment->nametypeequipment->description }}</li>
            </ul>
        </div>
    </div>
    <!-- Información del Área -->
    <div class="card mb-4">
        <div class="card-header" style="background-color: #ee194f; color: white;">
            Información del Área donde se encuentra
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Nombre: {{ $equipment->namearea->name }}</li>
                <li class="list-group-item">Información Topográfica: {{ $equipment->namearea->topographic_information }}</li>
            </ul>
        </div>
    </div>
</div>
<br>
@endsection
