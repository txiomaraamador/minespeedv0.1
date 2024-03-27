@extends('layouts.app')

@section('title', 'Vehicle Show')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-4 mb-4">Informacion completa del Vehiculo No: {{ $vehicle->serial_number }}</h1>
            </div>
            
        </div>
        <div class="card-group">
            
            <div class="card">
                <div class="card-body ">
                    <h5 class="card-title">Informacion de Vehiculo </h5>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <p class="card-text">Marca: {{ $vehicle->make }}</p>
                                <p class="card-text">Modelo: {{ $vehicle->model }}</p>
                                <p class="card-text">Manufactura: {{ $vehicle->manufacture }}</p>
                                <p class="card-text">Placa: {{ $vehicle->plate }}</p>
                                <p class="card-text">Carga: {{ $vehicle->tonnage }}</p>
                                <p class="card-text">Tipo de vehiculo: {{ $vehicle->nametypevehicle->name}}</p>
                            </div>
                        </div>
                     
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                        <h5 class="card-title">Informacion del conductor de vehiculo</h5>
                        @foreach($employees as $employee)
                        <div class="row">
                            <div class="col-md-6">
                                <p class="card-text">No de Identificacion: {{ $employee->identification_number }}</p>
                                <p class="card-text">Nombre: {{ $employee->name }} {{ $employee->lastname }}</p>
                                <p class="card-text">Correo: {{ $employee->email }}</p>
                                <p class="card-text">No. de Licencia: {{ $employee->license }}</p>
                                <p class="card-text">Cargo: {{ $employee->nameposition->name}}</p>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
            <div class="card">
                    
                    <div class="card-body">
                        <h5 class="card-title">Informacion del Area donde se encuentra</h5>
                        @foreach($areas as $area)
                        <div class="row">
                            <div class="col-md-6">
                                <p class="card-text">Nombre: {{ $area->name }}</p>
                                <p class="card-text">Informacion Topográfica: {{ $area->topographic_information }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
            </div>
        </div>

       
    </div>


    
@endsection
