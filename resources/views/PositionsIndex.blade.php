@extends('layouts.app')

@section('title', 'Positions Index')

@section('content')

<div class="container mt-4">
    <nav class="navbar border-bottom border-body">
        <div class="container-fluid">
            <h1 class="display-4 mb-4">Listado de Puestos</h1>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                @if(Auth::user()->role !== 'visualizer')
                <a class="dropdown-item" href="{{ route('positions.create') }}">
                    <button class="btn btn-primary" 
                    style="background-color: #ee194f; border-color: #ee194f; color: #fff;">
                        Agregar Puesto
                    </button>
                </a>
                @endif
            </div>
        </div>
    </nav>
    @endif

    @if(session('success'))
        <div id="alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <script>
        // Código JavaScript para ocultar la alerta después de unos segundos
        setTimeout(function(){
            var alert = document.getElementById('alert');
            if(alert) {
                alert.style.display = 'none';
            }
        }, 3000); // La alerta se ocultará después de 5 segundos (5000 milisegundos)
    </script>
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
