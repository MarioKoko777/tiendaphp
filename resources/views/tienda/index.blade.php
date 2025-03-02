@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Productos</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($productos as $producto)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('storage/images/' . $producto->imagen) }}" 
                         class="card-img-top img-fluid" 
                         style="height: 200px; object-fit: cover;"
                         alt="{{ $producto->nombre }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="card-text">Precio: {{ $producto->precio }}€</p>
                        <a href="{{ route('tienda.show', $producto->id) }}" class="btn btn-primary mt-auto">Ver más</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection