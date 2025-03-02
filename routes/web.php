<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AdminController; 

Route::get('/', [TiendaController::class, 'index'])->name('tienda.index');
Route::get('/producto/{id}', [TiendaController::class, 'show'])->name('tienda.show');
Route::get('/categoria/{id}', [TiendaController::class, 'categoria'])->name('tienda.categoria');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::middleware(['auth'])->group(function () {
    Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::get('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    Route::get('/carrito/ver', [CarritoController::class, 'ver'])->name('carrito.ver');
});
Route::post('/carrito/crear-pedido', [CarritoController::class, 'crearPedido'])->name('carrito.crear-pedido');

Route::middleware(['auth', 'admin'])->group(function () {
    // Panel de administración
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Gestión de usuarios
    Route::get('/admin/usuarios', [AdminController::class, 'usuarios'])->name('admin.usuarios');
    Route::get('/admin/usuarios/crear', [AdminController::class, 'crearUsuario'])->name('admin.usuarios.crear');    // Add this line
    Route::post('/admin/usuarios/guardar', [AdminController::class, 'guardarUsuario'])->name('admin.usuarios.guardar');    // Add this line
    Route::get('/admin/usuarios/editar/{id}', [AdminController::class, 'editarUsuario'])->name('admin.usuarios.editar');
    Route::put('/admin/usuarios/actualizar/{id}', [AdminController::class, 'actualizarUsuario'])->name('admin.usuarios.actualizar');
    Route::delete('/admin/usuarios/eliminar/{id}', [AdminController::class, 'eliminarUsuario'])->name('admin.usuarios.eliminar');
    // Gestión de productos
    Route::get('/admin/productos', [AdminController::class, 'productos'])->name('admin.productos');
    Route::get('/admin/productos/crear', [AdminController::class, 'crearProducto'])->name('admin.productos.crear');
    Route::post('/admin/productos/guardar', [AdminController::class, 'guardarProducto'])->name('admin.productos.guardar');
    Route::get('/admin/productos/editar/{id}', [AdminController::class, 'editarProducto'])->name('admin.productos.editar');
    Route::put('/admin/productos/actualizar/{id}', [AdminController::class, 'actualizarProducto'])->name('admin.productos.actualizar');
    Route::delete('/admin/productos/eliminar/{id}', [AdminController::class, 'eliminarProducto'])->name('admin.productos.eliminar');

    // Gestión de categorías
    Route::get('/admin/categorias', [AdminController::class, 'categorias'])->name('admin.categorias');
    Route::get('/admin/categorias/crear', [AdminController::class, 'crearCategoria'])->name('admin.categorias.crear');
    Route::post('/admin/categorias/guardar', [AdminController::class, 'guardarCategoria'])->name('admin.categorias.guardar');
    Route::get('/admin/categorias/editar/{id}', [AdminController::class, 'editarCategoria'])->name('admin.categorias.editar');
    Route::put('/admin/categorias/actualizar/{id}', [AdminController::class, 'actualizarCategoria'])->name('admin.categorias.actualizar');
    Route::delete('/admin/categorias/eliminar/{id}', [AdminController::class, 'eliminarCategoria'])->name('admin.categorias.eliminar');
});