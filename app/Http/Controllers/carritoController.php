<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\carrito;
use Illuminate\Support\Facades\Auth;

class carritoController extends Controller
{
    public function pasarela()
    {
        $cart = carrito::where('user_id', Auth::id())->get();
        $total = 0;
        foreach ($cart as $item) {
            $total += $item->producto->precio * $item->cantidad;
        }
        return view('principal.pasarela', compact('cart', 'total'));
    }

    public function carrito()
    {
        $cart = carrito::where('user_id', Auth::id())->get();
        $total = 0;
        foreach ($cart as $item) {
            $total += $item->producto->precio * $item->cantidad;
        }
        return view('principal.carrito', compact('cart', 'total'));
    }

    public function anadircarrito($id)
    {
        $producto = producto::findOrFail($id);
        $cartItem = carrito::where('user_id', Auth::id())->where('producto_id', $id)->first();
    
        if (!$cartItem) {
            carrito::create([
                'user_id' => Auth::id(),
                'producto_id' => $id,
                'cantidad' => 1,
            ]);
        } else {
            $cartItem->cantidad++;
            $cartItem->save();
        }
    
        $cartCount = carrito::where('user_id', Auth::id())->count();
        return redirect()->back()->with('success', 'El producto se añadió correctamente');
    }

    public function remove($id)
    {
        $cartItem = carrito::where('user_id', Auth::id())->where('producto_id', $id)->first();
        if ($cartItem) {
            $cartItem->delete();
        }
        return redirect()->back()->with('success', 'El producto se eliminó correctamente');
    }

    public function incrementar($id)
    {
        $cartItem = carrito::where('user_id', Auth::id())->where('producto_id', $id)->first();
        if ($cartItem) {
            $cartItem->cantidad++;
            $cartItem->save();
        }
        return redirect()->back()->with('success', 'Cantidad aumentada correctamente');
    }

    public function disminuir($id)
    {
        $cartItem = carrito::where('user_id', Auth::id())->where('producto_id', $id)->first();
        if ($cartItem) {
            if ($cartItem->cantidad > 1) {
                $cartItem->cantidad--;
                $cartItem->save();
            } else {
                return $this->remove($id);
            }
        }
        return redirect()->back()->with('success', 'Cantidad disminuida correctamente');
    }

    public function limpiarcarrito()
    {
        carrito::where('user_id', Auth::id())->delete();
        return redirect()->back()->with('success', 'El carrito se vació correctamente');
    }

    public function comprar()
    {
        $cart = carrito::where('user_id', Auth::id())->get();

        if ($cart->isEmpty()) {
            return redirect()->back()->with('error', 'No hay productos en el carrito para comprar.');
        }

        foreach ($cart as $item) {
            $producto = producto::findOrFail($item->producto_id);

            if ($producto->cantidad < $item->cantidad) {
                return redirect()->back()->with('error', "No hay suficiente stock para el producto: {$producto->nombre}.");
            }

            $producto->cantidad -= $item->cantidad;
            $producto->save();
        }

        carrito::where('user_id', Auth::id())->delete();

        return redirect("principal.carrito")->back()->with('success', 'Compra realizada correctamente.');
    }
}
