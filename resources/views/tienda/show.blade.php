@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $producto->nombre }}</h1>
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/images/' . $producto->imagen) }}" class="img-fluid" alt="{{ $producto->nombre }}">
        </div>
        <div class="col-md-6">
            <p>{{ $producto->descripcion }}</p>
            <p>Precio: {{ $producto->precio }}€</p>
            <p>Stock: {{ $producto->stock }}</p>

            <!-- Formulario para agregar al carrito -->
            <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                @csrf <!-- Token CSRF para protección -->
                <button type="submit" class="btn btn-primary">Agregar al carrito</button>
            </form>
        </div>
    </div>
</div>
@endsection