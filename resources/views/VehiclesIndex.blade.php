@extends('layouts.app')

@section('title', ' Vehicles Index')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1 class="display-4 mb-4">Listado de Vehiculos</h1>
        </div>
        
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No. de serie</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Manufactura</th>
                    <th>Placa</th>
                    <th>Carga</th>
                    <th>Tipo de vehiculo</th>
                    <th></th>
                    @if(Auth::user()->role !== 'visualizer')
                    <th></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->serial_number }}</td>
                    <td>{{ $vehicle->make }}</td>
                    <td>{{ $vehicle->model }}</td>
                    <td>{{ $vehicle->manufacture }}</td>
                    <td>{{ $vehicle->plate }}</td>
                    <td>{{ $vehicle->tonnage }}</td>
                    <td>{{ $vehicle->nametypevehicle->name}}</td>
                    <td>
                        <a href="{{ route('vehicles.show', $vehicle->id) }}" style="color: #ee194f;">Mostrar mas informacion</a>
                    </td>
                    @if(Auth::user()->role !== 'visualizer')
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            
                            <!-- Botón para editar el paciente -->
                            <form action="{{ route('vehicles.edit', $vehicle->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Editar</button>
                            </form>
                            <!-- Botón de eliminación -->
                            <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este Vehiculo?')">Eliminar</button>
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


