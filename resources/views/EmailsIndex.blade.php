@extends('layouts.app')

@section('title', 'Emails Index')

@section('content')

<div class="container mt-4">

    <nav class="navbar border-bottom border-body">
        <div class="container-fluid">
            <h1 class="display-4 mb-4">Medios para Alerta</h1>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                @if(Auth::user()->role !== 'visualizer')
                <a class="dropdown-item" href="{{ route('emails.create') }}">
                    <button class="btn btn-primary" 
                    style="background-color: #ee194f; border-color: #ee194f; color: #fff;">
                        Agregar Correo
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
                    <th>Informacion</th>
                    <th>Correos</th>
                    <th>Telefonos</th>
                    @if(Auth::user()->role !== 'visualizer')
                    <th></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($emails as $email)
                <tr>
                    <td>{{ $email->info }}</td>
                    <td>{{ $email->email }}</td>
                    <td>{{ $email->phone }}</td>
                    @if(Auth::user()->role !== 'visualizer')
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            
                            <!-- Botón para editar el paciente -->
                            <form action="{{ route('emails.edit', $email->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Editar</button>
                            </form>
                            <!-- Botón de eliminación -->
                            <form action="{{ route('emails.destroy', $email->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este Correo?')">Eliminar</button>
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


