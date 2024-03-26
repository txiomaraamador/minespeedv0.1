@extends('layouts.app')

@section('title', 'Positions Index')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1 class="display-4 mb-4">Listado de Cargos</h1>
        </div>
        
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($positions as $position)
                <tr>
                    <td>{{ $position->name }}</td>
                
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <!-- Botón para editar el paciente -->
                            <form action="{{ route('positions.edit', $position->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Editar</button>
                            </form>
                            <!-- Botón de eliminación -->
                            <form action="{{ route('positions.destroy', $position->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este cargo?')">Eliminar</button>
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
