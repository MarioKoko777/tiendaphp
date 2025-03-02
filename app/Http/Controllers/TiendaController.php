<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class TiendaController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('tienda.index', compact('productos', 'categorias'));
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all(); // Obtener todas las categorías
        return view('tienda.show', compact('producto', 'categorias')); // Pasar $categorias a la vista
    }

    public function categoria($id)
    {
        $categoria = Categoria::findOrFail($id);
        $productos = $categoria->productos;
        $categorias = Categoria::all(); // Obtener todas las categorías
        return view('tienda.categoria', compact('productos', 'categoria', 'categorias')); // Pasar $categorias a la vista
    }
}