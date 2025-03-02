@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Panel de Administración</h1>
    <ul>
        <li><a href="{{ route('admin.usuarios') }}">Gestionar Usuarios</a></li>
        <li><a href="{{ route('admin.productos') }}">Gestionar Productos</a></li>
        <li><a href="{{ route('admin.categorias') }}">Gestionar Categorías</a></li>
    </ul>
</div>
@endsection