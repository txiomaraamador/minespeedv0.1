@extends('layouts.app')

@section('title', ' equipments Index')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1 class="display-4 mb-4">Equipos existentes</h1>
        </div>
        
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No. de camara</th>
                    <th>Camara</th>
                    <th>Area donde se encuentra</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipments as $equipment)
                <tr>
                    <td>{{ $equipment->number }}</td>
                    <td>{{ $equipment->nametypeequipment->description }}</td>
                    <td>{{ $equipment->namearea->name }}</td>
                    <td>
                        <a href="{{ route('equipments.show', $equipment->id) }}" style="color: #ee194f;">Mostrar vehiculos en esta area</a>
                    </td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <!-- Botón para editar el paciente -->

                            <form action="{{ route('equipments.edit', $equipment->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Editar</button>
                            </form>
                            <!-- Botón de eliminación -->
                            <form action="{{ route('equipments.destroy', $equipment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este Equipo?')">Eliminar</button>
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

