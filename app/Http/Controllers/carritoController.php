<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\carrito;
use Illuminate\Support\Facades\Auth;
use App\Models\factura;
use App\Models\venta;

class carritoController extends Controller
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
        $cartCount = carrito::where('user_id', Auth::id())->count();
        session(['cartCount' => $cartCount]);
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
        session(['cartCount' => $cartCount]);

        return response()->json(['cartCount' => $cartCount]);
    }
    public function remove($id)
    {
        $cartItem = carrito::where('user_id', Auth::id())->where('producto_id', $id)->first();
        if ($cartItem) {
            $cartItem->delete();
            $cartCount = carrito::where('user_id', Auth::id())->count();
            session(['cartCount' => $cartCount]);
        }
        return redirect()->back();
    }

    public function incrementar($id)
    {
        $cartItem = carrito::where('user_id', Auth::id())->where('producto_id', $id)->first();
        $producto = producto::findOrFail($id);
        if ($cartItem && $cartItem->cantidad < $producto->cantidad) {
            $cartItem->cantidad++;
            $cartItem->save();
            return redirect()->back();
        } else {
            return redirect()->back()->with('success', 'lo siento no hay sufientes productos');
        }
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
        return redirect()->back();
    }

    public function limpiarcarrito()
    {
        carrito::where('user_id', Auth::id())->delete();
        $cartCount = 0;
        session(['cartCount' => $cartCount]);
        return response()->json(['cartCount' => $cartCount]);
    }

    public function comprar(Request $request, $producto_id)
    {
        $request->validate([
            'codigo_postal' => 'required|integer',
            'metodo_pago' => 'required|string|max:50',
        ]);
    
        $item = carrito::where('user_id', Auth::id())->where('producto_id', $producto_id)->first();
    
        if (!$item) {
            return redirect()->back();
        }
    
        $producto = producto::findOrFail($producto_id);
    
        if ($producto->cantidad < $item->cantidad) {
            return redirect()->back();
        }
    
        $producto->cantidad -= $item->cantidad;
        $producto->save();
    
        $total = $producto->precio * $item->cantidad;
    
        if($request->especificaciones == null){
            $request->especificaciones = "N/A";
        }

        $factura = factura::create([
            'user_id' => Auth::id(),
            'correo' => $request->correo,
            'direccion' => $request->direccion,
            'especificaciones' => $request->especificaciones,
            'codigo_postal' => $request->codigo_postal,
            'producto_id' => $producto_id,
            'cantidad_compra' => $item->cantidad,
            'medida' => $producto->medida,
            'metodo_pago' => $request->metodo_pago,
            'total' => $total,
        ]);
    
        venta::create([
            'vendedor_id' => $producto->productos_id,
            'cliente_id' => Auth::id(),
            'correo' => $request->correo,
            'direccion' => $request->direccion,
            'especificaciones' => $request->especificaciones,
            'codigo_postal' => $request->codigo_postal,
            'producto_id' => $producto_id,
            'cantidad' => $item->cantidad,
            'medida' => $producto->medida,
            'metodo_pago' => $request->metodo_pago,
            'precio_total' => $total,
        ]);
    
        $item->delete();
    
        $cartCount = carrito::where('user_id', Auth::id())->count();
        session(['cartCount' => $cartCount]);
    
        return view('principal.facturas', [$factura->id]);
    }

    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);
        $producto = producto::findOrFail($id);
        $cartItem = carrito::where('user_id', Auth::id())->where('producto_id', $id)->first();
        if ($cartItem && $request->cantidad <= $producto->cantidad) {
            $cartItem->cantidad = $request->cantidad;
            $cartItem->save();
            return redirect()->back();
        } else {
            return redirect()->back()->with('success', 'lo siento no hay sufientes productos');
        }
    }
    protected function authenticated(Request $request, $user)
    {
        $cartCount = carrito::where('user_id', $user->id)->count();
        session(['cartCount' => $cartCount]);
    }

    protected function loggedOut(Request $request)
    {
        session()->forget('cartCount');
    }
}
