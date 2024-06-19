<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\categoria;
class carritoController extends Controller
{
    public function carrito()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $id => $detalles) {
            $total += $detalles['precio'] * $detalles['cantidad'];
        }
        return view('principal.carrito', compact('cart', 'total'));
    }

    public function anadircarrito($id)
    {
        $producto = Producto::findOrFail($id);
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            $contar = session('cartCount', 0);
            $contar++;
            session(['cartCount' => $contar]);
            $cart[$id] = [
                'imagen' => $producto->imagen,
                'nombre' => $producto->nombre,
                'descripcion' => $producto->descripcion,
                'precio' => $producto->precio,
                'cantidad' => 1,
            ];
        } else {
            $cart[$id]['cantidad']++;
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'El producto se añadió correctamente');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $contar = session('cartCount', 0);
            $contar--;
            session(['cartCount' => $contar]);
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'El producto se eliminó correctamente');
    }

    public function incrementar($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['cantidad']++;
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Cantidad aumentada correctamente');
    }

    public function disminuir($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            if ($cart[$id]['cantidad'] > 1) {
                $cart[$id]['cantidad']--;
                session()->put('cart', $cart);
            } else {
                return $this->remove($id);
            }
        }
        return redirect()->back()->with('success', 'Cantidad disminuida correctamente');
    }

    public function limpiarcarrito()
    {
        session()->forget('cart');
        session()->forget('cartCount');
        return redirect()->back()->with('success', 'El carrito se vació correctamente');
    }

    public function comprar()
    {
        $cart = session()->get('cart', []);

        if (!$cart || count($cart) == 0) {
            return redirect()->back()->with('error', 'No hay productos en el carrito para comprar.');
        }

        foreach ($cart as $id => $detalles) {
            $producto = Producto::findOrFail($id);

            if ($producto->cantidad < $detalles['cantidad']) {
                return redirect()->back()->with('error', "No hay suficiente stock para el producto: {$producto->nombre}.");
            }

            $producto->cantidad -= $detalles['cantidad'];
            $producto->save();
        }

        session()->forget('cart');
        session()->forget('cartCount');

        return redirect()->back()->with('success', 'Compra realizada correctamente.');
    }
}
