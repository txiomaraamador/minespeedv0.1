@extends('layouts.app')

@section('title', ' Employees Index')

@section('content')

<div class="container mt-4">
<nav class="navbar border-bottom border-body">
    <div class="container-fluid">
        <h1 class="display-4 mb-4">Empleados</h1>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            @if(Auth::user()->role !== 'visualizer')
            <a class="dropdown-item" href="{{ route('employees.create') }}">
                <button class="btn btn-primary" 
                style="background-color: #ee194f; border-color: #ee194f; color: #fff;">
                    Agregar Empleado
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
                    <th>No. Ident</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Licencia</th>
                    <th>Cargo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->identification_number }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->lastname }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->license }}</td>
                    <td>{{ $employee->nameposition->name}}</td>
                    @if(Auth::user()->role !== 'visualizer')
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <!-- Botón para editar el paciente -->
                            <form action="{{ route('employees.edit', $employee->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Editar</button>
                            </form>
                            <!-- Botón de eliminación -->
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este Empleado?')">Eliminar</button>
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

