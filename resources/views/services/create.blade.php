@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Servicio</h1>

        <form action="{{ route('services.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Crear Servicio</button>
        </form>
    </div>
@endsection
