@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Carrito de Compras</h1>

    <!-- Mostrar mensajes de éxito o error -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Verificar si el carrito está vacío -->
    @if (empty($carrito))
        <div class="alert alert-info">
            Tu carrito está vacío. ¡Agrega algunos productos!
        </div>
    @else
        <!-- Mostrar los productos del carrito -->
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carrito as $id => $detalles)
                    <tr>
                        <td>{{ $detalles['nombre'] }}</td>
                        <td>{{ $detalles['cantidad'] }}</td>
                        <td>{{ $detalles['precio'] }}€</td>
                        <td>{{ $detalles['precio'] * $detalles['cantidad'] }}€</td>
                        <td>
                            <a href="{{ route('carrito.eliminar', $id) }}" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row mt-4">
            <div class="col-md-6">
                <h3>Total: {{ array_sum(array_map(function($item) { 
                    return $item['precio'] * $item['cantidad'];
                }, $carrito)) }}€</h3>
            </div>
            <div class="col-md-6 text-right">
                <form action="{{ route('carrito.crear-pedido') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Realizar Pedido</button>
                </form>
            </div>
        </div>
    @endif
</div>
@endsection