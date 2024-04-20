@extends('layouts.app')

@section('title', 'Typeequipments Index')

@section('content')

<div class="container mt-4">

    <nav class="navbar border-bottom border-body">
        <div class="container-fluid">
            <h1 class="display-4 mb-4">Tipos de equipos</h1>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                @if(Auth::user()->role !== 'visualizer')
                <a class="dropdown-item" href="{{ route('typeequipments.create') }}">
                    <button class="btn btn-primary" 
                    style="background-color: #ee194f; border-color: #ee194f; color: #fff;">
                        Agregar Tipo de equipo
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
                    <th>Marca</th>
                    <th>Description</th>
                    <th>Modelo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($typeequipments as $typeequipment)
                <tr>
                    <td>{{ $typeequipment->make }}</td>
                    <td>{{ $typeequipment->description }}</td>
                    <td>{{ $typeequipment->model }}</td>
                    @if(Auth::user()->role !== 'visualizer')
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <!-- Botón para editar el paciente -->
                            <form action="{{ route('typeequipments.edit', $typeequipment->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Editar</button>
                            </form>
                            <!-- Botón de eliminación -->
                            <form action="{{ route('typeequipments.destroy', $typeequipment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este tipo de equipo')">Eliminar</button>
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
