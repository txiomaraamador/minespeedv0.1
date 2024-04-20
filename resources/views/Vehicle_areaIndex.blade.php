@extends('layouts.app')

@section('title', ' Employees Index')

@section('content')

<div class="container mt-4">
    <nav class="navbar border-bottom border-body">
        <div class="container-fluid">
            <h1 class="display-4 mb-4">Vehiculos por Area</h1>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                @if(Auth::user()->role !== 'visualizer')
                <a class="dropdown-item" href="{{ route('vehicle_areas.create') }}">
                    <button class="btn btn-primary" 
                    style="background-color: #ee194f; border-color: #ee194f; color: #fff;">
                        Asignar vehiculo
                    </button>
                </a>
                @endif
            </div>
        </div>
    </nav>


    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No. de serie</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Placa</th>
                    <th>Area</th>
                    <th>Informacion topografica</th>
                    <th></th>
                    @if(Auth::user()->role !== 'visualizer')
                    <th></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicle_areas as $vehicle_area)
                <tr>
                    <td>{{ $vehicle_area->namevehicle->serial_number }}</td>
                    <td>{{ $vehicle_area->namevehicle->make }}</td>
                    <td>{{ $vehicle_area->namevehicle->model }}</td>
                    <td>{{ $vehicle_area->namevehicle->plate }}</td>
                    <td>{{ $vehicle_area->namearea->name }}</td>
                    <td>{{ $vehicle_area->namearea->topographic_information }}</td>
                    <td>
                        <a href="{{ route('vehicles.show', $vehicle_area->namevehicle->id) }}" style="color: #ee194f;">Mostrar mas informacion</a>
                    </td>
                    @if(Auth::user()->role !== 'visualizer')
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    
                            <!-- Botón de eliminación -->
                            <form action="{{ route('vehicle_area.destroy', $vehicle_area->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este elemento?')">Eliminar</button>
                            </form>
                        </div>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

