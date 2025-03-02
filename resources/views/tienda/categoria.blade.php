@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Productos de {{ $categoria->nombre }}</h1>
    <div class="row">
        @foreach($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/images/' . $producto->imagen) }}" 
                         class="card-img-top img-fluid" 
                         style="height: 200px; object-fit: cover;"
                         alt="{{ $producto->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="card-text">Precio: {{ $producto->precio }}€</p>
                        <a href="{{ route('tienda.show', $producto->id) }}" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection