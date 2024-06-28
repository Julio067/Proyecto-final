<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\carrito;
use Illuminate\Support\Facades\Auth;
use App\Models\factura;

class CarritoController extends Controller
{
    public function pasarela($producto_id)
    {
        $item = carrito::where('user_id', Auth::id())->where('producto_id', $producto_id)->first();
        $total = $item->producto->precio * $item->cantidad;
        return view('principal.pasarela', compact('item', 'total'));
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
            $cartCount = carrito::where('user_id', Auth::id())->count();
            session(['cartCount' => $cartCount]);
        } else {
            $cartItem->save();
        }

        return redirect()->back();
    }

    public function remove($id)
    {
        $cartItem = carrito::where('user_id', Auth::id())->where('producto_id', $id)->first();
        if ($cartItem) {
            $cartItem->delete();
            $cartCount = carrito::where('user_id', Auth::id())->count();
            session(['cartCount' => $cartCount]);
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
    
        return redirect()->back()->with('success', 'El producto se añadió correctamente');
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

    public function comprar(Request $request, $producto_id)
    {
        $request->validate([
            'codigo_postal' => 'required|integer',
            'metodo_pago' => 'required|string|max:50',
        ]);

        $item = carrito::where('user_id', Auth::id())->where('producto_id', $producto_id)->first();

        if (!$item) {
            return redirect()->back()->with('error', 'Producto no encontrado en el carrito.');
        }

        $producto = producto::findOrFail($producto_id);

        if ($producto->cantidad < $item->cantidad) {
            return redirect()->back()->with('error', "No hay suficiente stock para el producto: {$producto->nombre}.");
        }

        $producto->cantidad -= $item->cantidad;
        $producto->save();

        $total = $producto->precio * $item->cantidad;

        $factura = factura::create([
            'user_id' => Auth::id(),
            'correo' => $request->correo,
            'direccion' => $request->direccion,
            'codigo_postal' => $request->codigo_postal,
            'metodo_pago' => $request->metodo_pago,
            'producto_id' => $producto_id,
            'cantidad_compra' => $item->cantidad,
            'total' => $total,
        ]);

        carrito::where('user_id', Auth::id())->delete();
        $cartCount = carrito::where('user_id', Auth::id())->count();
        session(['cartCount' => $cartCount]);

        $item->delete();

        return redirect()->route('factura.mostrar', $factura->id)->with('success', 'Compra realizada correctamente.');
    }

    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        $cartItem = carrito::where('user_id', Auth::id())->where('producto_id', $id)->first();
        if ($cartItem) {
            $cartItem->cantidad = $request->cantidad;
            $cartItem->save();
            return redirect()->back()->with('success', 'Cantidad actualizada correctamente');
        }
        return response()->json(['success' => false, 'message' => 'Item no encontrado']);
    }
}