@extends('layouts.app')

@section('title', ' Users Index')

@section('content')

<div class="container mt-4">

    <nav class="navbar border-bottom border-body">
        <div class="container-fluid">
            <h1 class="display-4 mb-4">Usuarios</h1>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                @if(Auth::user()->role !== 'visualizer')
                <a class="dropdown-item" href="{{ route('register') }}">
                    <button class="btn btn-primary" 
                    style="background-color: #ee194f; border-color: #ee194f; color: #fff;">
                        Agregar Usuario
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
            <tbody id="usersTableBody">
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById('searchInput');
        const usersTableBody = document.getElementById('usersTableBody');
        const users = {!! json_encode($users) !!}; // Convert PHP array to JavaScript object

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.trim().toLowerCase();

            const filteredUsers = users.filter(user => {
                return Object.values(user).some(value =>
                    typeof value === 'string' && value.toLowerCase().includes(searchTerm)
                );
            });

            renderUsers(filteredUsers);
        });

        function renderUsers(users) {
            usersTableBody.innerHTML = '';

            users.forEach(user => {
                const row = `
                    <tr>
                        <td>${user.name}</td>
                        <td>${user.lastname}</td>
                        <td>${user.email}</td>
                        <td>${user.role}</td>
                        <td>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <form action="{{ route('users.destroy', '') }}/${user.id}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este Usuario?')">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                `;
                usersTableBody.innerHTML += row;
            });
        }
    });
</script>

@endsection
