@extends('layouts.app')

@section('title', 'Equipment Show')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-4 mb-4">Informacion completa del Equipo No: {{ $equipment->number }}</h1>
            </div>
            
        </div>
        <div class="card-group">
            
            <div class="card">
                <div class="card-body ">
                    <h5 class="card-title">Informacion de Equipo </h5>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <p class="card-text">Marca: {{ $equipment->nametypeequipment->make }}</p>
                                <p class="card-text">Modelo: {{ $equipment->nametypeequipment->model }}</p>
                                <p class="card-text">Descripcion: {{ $equipment->nametypeequipment->description }}</p>
                            </div>
                        </div>
                     
                </div>
            </div>
            <div class="card"> 
                    <div class="card-body">
                        <h5 class="card-title">Informacion del Area donde se encuentra</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="card-text">Nombre: {{ $equipment->namearea->name }}</p>
                                <p class="card-text">Informacion Topográfica: {{ $equipment->namearea->topographic_information }}</p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

       
    </div>


    
@endsection
