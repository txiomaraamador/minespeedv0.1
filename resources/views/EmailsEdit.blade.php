@extends('layouts.app')

@section('title', 'Email Edit')
@section('content')
<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Editar Correo</h2>
            <hr style="border-top: 2px solid #ee194f;">
            <form method="POST" action="{{ route('emails.update', $email->id) }}">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="info" class="form-label">Informacion:</label>
                            <input type="text" class="form-control" id="info" name="info" value="{{ $email->info }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo:</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ $email->email }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Celular:</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $email->phone }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" style="background-color: #ee194f; border-color: #ee194f; color: #fff;">Guardar Cambios</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
