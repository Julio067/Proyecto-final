<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\categoria;
class carritoController extends Controller
{
    public function cart(){
        return view('principal.carrito');
    }
    public function anadircart($id){
        $producto=producto::findorfail($id);
        $cart=session()->get('cart');
        if (!$cart){
            $cart=[
                $id=>[
                    
                    'nombre'=>$producto->nombre,
                    'descripcion'=>$producto->descripcion,
                    'precio'=>$producto->precio,
                    'cantidad'=>$producto->cantidad,
                    'categoria'=>$producto->categoria,
                    'medida'=>$producto->medida,
                    'imagen'=>$producto->imagen
                ]
            ];
            session()->put('cart',$cart);
            return redirect()->back()->with('sucess','el producto se añadio correctamente');
        }
        $cart[$id]=[
            
            'nombre'=>$producto->nombre,
            'descripcion'=>$producto->descripcion,
            'precio'=>$producto->precio,
            'cantidad'=>$producto->cantidad,
            'categoria'=>$producto->categoria,
            'medida'=>$producto->medida,
            'imagen'=>$producto->imagen
        ];
        session()->put('cart',$cart);
        return redirect()->back()->with('sucess','el producto se añadio correctamente');
    }
    public function remove($id){
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'El producto se eliminó correctamente');
    }
}
