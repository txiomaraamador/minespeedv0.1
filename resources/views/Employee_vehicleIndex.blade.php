@extends('layouts.app')

@section('title', ' Employees Index')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col">
        </div>
        
    </div>
    <nav class="navbar border-bottom border-body">
        <div class="container-fluid">
            <h1 class="display-4 mb-4">Vehiculos por Empleados</h1>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                @if(Auth::user()->role !== 'visualizer')
                <a class="dropdown-item" href="{{ route('employee_vehicles.create') }}">
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
                    <th>Chofer</th>
                    <th></th>
                    @if(Auth::user()->role !== 'visualizer')
                    <th></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($employee_vehicles as $employee_vehicle)
                <tr>
                    <td>{{ $employee_vehicle->namevehicle->serial_number }}</td>
                    <td>{{ $employee_vehicle->namevehicle->make }}</td>
                    <td>{{ $employee_vehicle->namevehicle->model }}</td>
                    <td>{{ $employee_vehicle->namevehicle->plate }}</td>
                    <td>{{ $employee_vehicle->nameemployee->identification_number }}, {{ $employee_vehicle->nameemployee->name }} {{ $employee_vehicle->nameemployee->lastname }}</td>
                    <td>
                        <a href="{{ route('vehicles.show', $employee_vehicle->namevehicle->id) }}" style="color: #ee194f;">Mostrar mas informacion</a>
                    </td>
                    @if(Auth::user()->role !== 'visualizer')
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        
                            <!-- Botón de eliminación -->
                            <form action="{{ route('employee_vehicles.destroy', $employee_vehicle->id) }}" method="POST">
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

