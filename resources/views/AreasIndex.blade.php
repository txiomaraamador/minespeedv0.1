@extends('layouts.app')

@section('title', 'Áreas Index')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<nav class="navbar border-bottom border-body">
    <div class="container-fluid">
        <h1 class="display-4 mb-4">Áreas existentes</h1>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            @if(Auth::user()->role !== 'visualizer')
            <a class="dropdown-item" href="{{ route('areas.create') }}">
                <button class="btn btn-primary" 
                style="background-color: #ee194f; border-color: #ee194f; color: #fff;">
                    Agregar Área
                </button>
            </a>
            @endif
            <div class="input-group mb-3">
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" id="searchInput" placeholder="Buscar en la lista..." aria-label="Search">
              </form>
            </div>
            
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
<div class="container">

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Información Topográfica</th>
                    <th></th>
                    @if(Auth::user()->role !== 'visualizer')
                    <th></th>
                    @endif
                </tr>
            </thead>
            <tbody id="areasTableBody">
                @foreach ($areas as $area)
                <tr>
                    <td>{{ $area->name }}</td>
                    <td>{{ $area->topographic_information }}</td>
                    <td>
                        <a href="{{ route('areas.show', $area->id) }}" style="color: #ee194f;">Mostrar vehículos en esta área</a>
                    </td>
                    @if(Auth::user()->role !== 'visualizer')
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <!-- Botón para editar el paciente -->
                            <form action="{{ route('areas.edit', $area->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Editar</button>
                            </form>
                            <!-- Botón de eliminación -->
                            <form action="{{ route('areas.destroy', $area->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta área?')">Eliminar</button>
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById('searchInput');
        const areasTableBody = document.getElementById('areasTableBody');
        const areas = {!! json_encode($areas) !!}; // Convert PHP array to JavaScript object

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.trim().toLowerCase();

            const filteredAreas = areas.filter(area => {
                return Object.values(area).some(value =>
                    typeof value === 'string' && value.toLowerCase().includes(searchTerm)
                );
            });

            renderAreas(filteredAreas);
        });

        function renderAreas(areas) {
            areasTableBody.innerHTML = '';

            areas.forEach(area => {
                const row = `
                    <tr>
                        <td>${area.name}</td>
                        <td>${area.topographic_information}</td>
                        <td>
                            <a href="{{ route('areas.show', '') }}/${area.id}" style="color: #ee194f;">Mostrar vehículos en esta área</a>
                        </td>
                        @if(Auth::user()->role !== 'visualizer')
                        <td>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <form action="{{ route('areas.edit', '') }}/${area.id}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success">Editar</button>
                                </form>
                                <form action="{{ route('areas.destroy', '') }}/${area.id}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta área?')">Eliminar</button>
                                </form>
                            </div>
                        </td>
                        @endif
                    </tr>
                `;
                areasTableBody.innerHTML += row;
            });
        }
    });
</script>

@endsection
