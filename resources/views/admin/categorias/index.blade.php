@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestión de Categorías</h1>
    <a href="{{ route('admin.categorias.crear') }}" class="btn btn-primary mb-3">Crear Categoría</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>
                        <a href="{{ route('admin.categorias.editar', $categoria->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('admin.categorias.eliminar', $categoria->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection