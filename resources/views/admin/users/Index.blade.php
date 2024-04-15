@extends('layouts.app')

@section('title', ' Users Index')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1 class="display-4 mb-4">Listado de Usuarios</h1>
        </div>
        
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                   
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <!-- Botón para editar el paciente -->
                            <form action="{{ route('users.edit', $user->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Editar</button>
                            </form>
                            <!-- Botón de eliminación -->
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este Usuario?')">Eliminar</button>
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
