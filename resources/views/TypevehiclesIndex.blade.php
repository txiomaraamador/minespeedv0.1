@extends('layouts.app')

@section('title', 'Typevehicles Index')

@section('content')

<div class="container mt-4">
    <nav class="navbar border-bottom border-body">
        <div class="container-fluid">
            <h1 class="display-4 mb-4">Tipo de vehiculos</h1>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                @if(Auth::user()->role !== 'visualizer')
                <a class="dropdown-item" href="{{ route('typevehicles.create') }}">
                    <button class="btn btn-primary" 
                    style="background-color: #ee194f; border-color: #ee194f; color: #fff;">
                        Agregar tipo de vehiculo
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
                    <th>Nombre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($typevehicles as $typevehicle)
                <tr>
                    <td>{{ $typevehicle->name }}</td>
                   
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <!-- Botón para editar el paciente -->
                            <form action="{{ route('typevehicles.edit', $typevehicle->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Editar</button>
                            </form>
                            <!-- Botón de eliminación -->
                            <form action="{{ route('typevehicles.destroy', $typevehicle->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este tipo de vehiculo')">Eliminar</button>
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
