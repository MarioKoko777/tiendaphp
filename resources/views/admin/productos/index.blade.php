@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestión de Productos</h1>
    <a href="{{ route('admin.productos.crear') }}" class="btn btn-primary mb-3">Crear Producto</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->precio }}€</td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    <td>
                        <a href="{{ route('admin.productos.editar', $producto->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('admin.productos.eliminar', $producto->id) }}" method="POST" style="display:inline;">
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