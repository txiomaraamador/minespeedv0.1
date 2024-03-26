@extends('layouts.app')

@section('title', ' Employees Index')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1 class="display-4 mb-4">Listado de Vehiculos por Empleados</h1>
        </div>
        
    </div>

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
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <!-- Botón para editar el paciente -->
                            
                            <!-- Botón de eliminación -->
                            <form action="{{ route('employee_vehicles.destroy', $employee_vehicle->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este elemento?')">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

