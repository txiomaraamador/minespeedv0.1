@extends('layouts.app')

@section('title', ' Histories Index')

@section('content')

<div class="container mt-4">
    <nav class="navbar border-bottom border-body">
        <div class="container-fluid">
            <h1 class="display-4 mb-4">Historial de Alertas</h1>
        </div>
    </nav>


    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Mensaje</th>
                    <th>Velocidad</th>
                    <th>Empleado</th>
                    <th>Vehiculo</th>
                    <th>Area</th>
                    <th></th>
                    @if(Auth::user()->role !== 'visualizer')
                    <th></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $history)
                <tr>
                    <td>{{ $history->date }}</td>
                    <td>{{ $history->message }}</td>
                    <td>{{ $history->speed }}</td>
                    <td>{{ $history->employee_vehicle->nameemployee->name }}</td>
                    <td>{{ $history->employee_vehicle->namevehicle->serial_number }}</td>
                    <td>{{ $history->nameequipment->namearea->name }}</td>
                    <td>
                        <a href="{{ route('histories.show', $history->id) }}" style="color: #ee194f;">Mostrar mas informacion</a>
                    </td>
                    @if(Auth::user()->role !== 'visualizer')
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <!-- Botón de eliminación -->
                            <form action="{{ route('histories.destroy', $history->id) }}" method="POST">
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
