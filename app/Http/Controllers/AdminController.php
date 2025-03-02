<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Producto;
use App\Models\Categoria;

class AdminController extends Controller
{
    // Panel de administración
    public function index()
    {
        return view('admin.index');
    }

    // Gestión de usuarios
    public function usuarios()
    {
        $usuarios = Usuario::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function editarUsuario($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('admin.usuarios.editar', compact('usuario'));
    }

    public function actualizarUsuario(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());
        return redirect()->route('admin.usuarios')->with('success', 'Usuario actualizado correctamente.');
    }

    public function eliminarUsuario($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect()->route('admin.usuarios')->with('success', 'Usuario eliminado correctamente.');
    }

    // Gestión de productos
    public function productos()
    {
        $productos = Producto::all();
        return view('admin.productos.index', compact('productos'));
    }

    public function crearProducto()
    {
        $categorias = Categoria::all();
        return view('admin.productos.crear', compact('categorias'));
    }

    public function guardarProducto(Request $request)
    {
        Producto::create($request->all());
        return redirect()->route('admin.productos')->with('success', 'Producto creado correctamente.');
    }

    public function editarProducto($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        return view('admin.productos.editar', compact('producto', 'categorias'));
    }

    public function actualizarProducto(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        return redirect()->route('admin.productos')->with('success', 'Producto actualizado correctamente.');
    }

    public function eliminarProducto($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('admin.productos')->with('success', 'Producto eliminado correctamente.');
    }

    // Gestión de categorías
    public function categorias()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.index', compact('categorias'));
    }

    public function crearCategoria()
    {
        return view('admin.categorias.crear');
    }

    public function guardarCategoria(Request $request)
    {
        Categoria::create($request->all());
        return redirect()->route('admin.categorias')->with('success', 'Categoría creada correctamente.');
    }

    public function editarCategoria($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('admin.categorias.editar', compact('categoria'));
    }

    public function actualizarCategoria(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
        return redirect()->route('admin.categorias')->with('success', 'Categoría actualizada correctamente.');
    }

    public function eliminarCategoria($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('admin.categorias')->with('success', 'Categoría eliminada correctamente.');
    }

    public function guardarUsuario(Request $request)
    {
        Usuario::create($request->all());
        return redirect()->route('admin.usuarios')->with('success', 'Usuario creado correctamente.');
    }
}