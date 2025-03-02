<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\LineaPedido;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function agregar(Request $request, $id)
    {
        // Buscar el producto en la base de datos
        $producto = Producto::findOrFail($id);

        // Obtener el carrito de la sesión (o un array vacío si no existe)
        $carrito = session()->get('carrito', []);

        // Verificar si el producto ya está en el carrito
        if (isset($carrito[$id])) {
            // Incrementar la cantidad si el producto ya está en el carrito
            $carrito[$id]['cantidad']++;
        } else {
            // Agregar el producto al carrito si no está
            $carrito[$id] = [
                "nombre" => $producto->nombre,
                "cantidad" => 1,
                "precio" => $producto->precio,
                "imagen" => $producto->imagen
            ];
        }

        // Guardar el carrito actualizado en la sesión
        session()->put('carrito', $carrito);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    public function eliminar($id)
    {
        // Obtener el carrito de la sesión (o un array vacío si no existe)
        $carrito = session()->get('carrito', []);

        // Verificar si el producto está en el carrito
        if (isset($carrito[$id])) {
            // Eliminar el producto del carrito
            unset($carrito[$id]);

            // Guardar el carrito actualizado en la sesión
            session()->put('carrito', $carrito);

            // Redirigir con un mensaje de éxito
            return redirect()->back()->with('success', 'Producto eliminado del carrito');
        }

        // Redirigir con un mensaje de error si el producto no estaba en el carrito
        return redirect()->back()->with('error', 'El producto no estaba en el carrito');
    }

    public function ver()
    {
        // Obtener el carrito de la sesión (o un array vacío si no existe)
        $carrito = session()->get('carrito', []);

        // Pasar el carrito a la vista
        return view('carrito.ver', compact('carrito'));
    }

    public function crearPedido(Request $request)
    {
        // Check if cart is empty
        $carrito = session()->get('carrito', []);
        if (empty($carrito)) {
            return redirect()->back()->with('error', 'El carrito está vacío');
        }

        try {
            DB::beginTransaction();

            // Create the order
            $pedido = Pedido::create([
                'usuario_id' => Auth::id(),
                'coste' => array_sum(array_map(function($item) { 
                    return $item['precio'] * $item['cantidad'];
                }, $carrito)),
                'estado' => 'pendiente',
                'fecha' => now()->toDateString(),
                'hora' => now()->toTimeString(),
                // You might want to add these fields through a form
                'provincia' => 'Pendiente',
                'localidad' => 'Pendiente',
                'direccion' => 'Pendiente',
            ]);

            // Create order lines and update stock
            foreach ($carrito as $producto_id => $detalles) {
                $producto = Producto::findOrFail($producto_id);
                
                // Check if enough stock
                if ($producto->stock < $detalles['cantidad']) {
                    throw new \Exception("No hay suficiente stock para {$producto->nombre}");
                }

                // Create order line
                LineaPedido::create([
                    'pedido_id' => $pedido->id,
                    'producto_id' => $producto_id,
                    'unidades' => $detalles['cantidad'],
                ]);

                // Update stock
                $producto->stock -= $detalles['cantidad'];
                $producto->save();
            }

            // Clear the cart
            session()->forget('carrito');

            DB::commit();
            return redirect()->route('carrito.ver')->with('success', 'Pedido realizado con éxito');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al crear el pedido: ' . $e->getMessage());
        }
    }
}