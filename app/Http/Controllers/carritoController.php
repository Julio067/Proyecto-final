<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\categoria;
class carritoController extends Controller
{
    public function cart(){
        $cart = session()->get('cart');
        $total = 0;

        foreach ($cart as $id => $detalles) {
            $total += $detalles['precio'] * $detalles['cantidad'];
        }

        return view('principal.carrito',compact('cart','total'));
    }
    public function anadircart($id){
        
        $producto=producto::findorfail($id);
        $cart=session()->get('cart');
        if (!isset($cart[$id])){
            $contar=session('cartCount',0);
            $contar++;
            session(['cartCount'=>$contar]);
            $cart[$id]=[
                'nombre'=>$producto->nombre,
                'descripcion'=>$producto->descripcion,
                'precio'=>$producto->precio,
                'cantidad'=>$producto->cantidad,
                'categoria'=>$producto->categoria,
                'medida'=>$producto->medida,
                'imagen'=>$producto->imagen
            ];
        }
        
        session()->put('cart',$cart);
        return redirect()->back()->with('sucess','el producto se añadio correctamente');
    }
    public function remove($id){
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $contar=session('cartCount',0);
            $contar--;
            session(['cartCount'=>$contar]);
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'el producto se eliminó correctamente');
    }
}
