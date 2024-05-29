<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;

class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productosU=producto::all();
        return view('principal.usuario', ['productosContU'=>$productosU]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('principal.create');
        
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
            'nomb'=>'required|min:8',
            'desc'=>'required|min:8|max:40',
            'prec'=>'required|numeric|min:0',
            'cant'=>'required|numeric|min:0',
            'imag'=>'required|image|mimes:jpeg,png,svg|max:1024'
        ]);
        //
        $image=$request->file('imag');
        $nameimg = time().'.'.$image -> getClientOriginalExtension();
        $destino = public_path('img');
        $image -> move($destino,$nameimg);
        $newproducto = new producto();
        $newproducto->nombre=$request->get('nomb');
        $newproducto->descripcion=$request->get('desc');
        $newproducto->precio=$request->get('prec');
        $newproducto->cantidad=$request->get('cant');
        $newproducto->$nameimg;
        $newproducto->save();
        return redirect('/usuario');
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
        return view ('principal.delete', [
            'productoEliminarV'=>$nombreP
        ]);
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
        return view ('principal.edit', [
            'productoEditarV'=>$productoEdit
        ]);
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
            'nombEd'=>'required|min:8',
            'descEd'=>'required|min:8|max:40',
            'precEd'=>'required|numeric|min:0',
            'cantEd'=>'required|numeric|min:0'
        ]);
        
        $editproducto =  producto:: findOrFail($id);
        $editproducto->nombre=$request->get('nombEd');
        $editproducto->descripcion=$request->get('descEd');
        $editproducto->precio=$request->get('precEd');
        $editproducto->cantidad=$request->get('cantEd');
        $editproducto->save();
        return redirect('/usuario');
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
        return redirect('/usuario');
    }
}
