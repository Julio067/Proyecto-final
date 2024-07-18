<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\categoria;
use App\Models\factura;
use App\Models\Venta;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user=Auth::user();
        $productosU=producto::where('productos_id',$user->id)->get();

        if ($request->has('categoria_id')) {
            $productosU->where('categorias_id', $request->categoria_id);
        }

        $categorias = categoria::all();

        $factu=factura::where('user_id',$user->id)->get();
        $ventas = venta::where('vendedor_id', Auth::id())->get();

        return view('principal.cuenta', [
            'productosContU' => $productosU,
            'categoriasContU' => $categorias,
            'facturas' => $factu,
            'ventas' => $ventas
        ]);
    }
                                                                                                    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = categoria::all();
        return view('principal.create', ['categoriasCont'=>$categorias]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valip = $request->validate([
            'nomb'=>'required|min:4',
            'desc'=>'required|min:8|max:40',
            'prec'=>'required|numeric|min:0',
            'cant'=>'required|numeric|min:0',
            'imag'=>'required|image|mimes:jpeg,png,svg|max:1024'
        ]);
        //
        $newproducto = new producto();
        $newproducto->productos_id=Auth::id();
        $newproducto->nombre=$request->get('nomb');
        $newproducto->descripcion=$request->get('desc');
        $newproducto->precio=$request->get('prec');
        $newproducto->cantidad=$request->get('cant');
        $newproducto->categorias_id=$request->get('cate');
        $newproducto->medida=$request->get('medi');
        if($request->hasFile('imag')){
            $imagen=$request->file('imag');
            $nombreimagen=Str::slug($request->get('nomb')).".".$imagen->guessExtension();
            $ruta=public_path('image_creada/');
            $imagen->move($ruta,$nombreimagen);
            $newproducto->imagen=$nombreimagen;
        }
        $newproducto->save();
        return redirect('/usuario-cuenta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nombreP = producto:: findOrFail($id);
        return view ('principal.delete', ['productoEliminarV'=>$nombreP]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productoEdit = producto:: findOrFail($id);
        $categoriaEdit = categoria::all();
        return view ('principal.edit', ['productoEditarV'=>$productoEdit], ['categoriaEditarV'=>$categoriaEdit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valipE = $request->validate([
            'nombEd'=>'required',
            'descEd'=>'required|max:40',
            'precEd'=>'required|numeric|min:0',
            'cantEd'=>'required|numeric|min:0'
        ]);
        
        $editproducto =  producto:: findOrFail($id);
        $editproducto->nombre=$request->get('nombEd');
        $editproducto->descripcion=$request->get('descEd');
        $editproducto->precio=$request->get('precEd');
        $editproducto->cantidad=$request->get('cantEd');
        $editproducto->categorias_id=$request->get('cateEd');
        $editproducto->medida=$request->get('mediEd');
        if($request->hasFile('imagEd')){
            $imagen=$request->file('imagEd');
            $nombreimagen=Str::slug($request->get('nombEd')).".".$imagen->guessExtension();
            $ruta=public_path('image_creada/');
            $imagen->move($ruta,$nombreimagen);
            $editproducto->imagen=$nombreimagen;
        }
        $editproducto->save();
        return redirect('/usuario-cuenta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteproducto = producto:: findOrFail($id);
        $deleteproducto-> delete();
        return redirect('/usuario-cuenta');
    }
}
