@extends('layouts.app')

@section('title', 'Emails Create')
@section('content')

<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Agregar Correos para aletrtas</h2>
            <hr style="border-top: 2px solid #ee194f;">
            <form method="POST" action="{{ route('emails.store') }}">
                @csrf
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="info" class="form-label">Informacion:</label>
                            <input type="text" class="form-control" id="info" name="info">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo:</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Celular:</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('emails.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary" style="background-color: #ee194f; border-color: #ee194f; color: #fff;">Guardar</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
