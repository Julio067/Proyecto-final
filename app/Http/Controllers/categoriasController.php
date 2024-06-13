<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class categoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriasList = categoria::all();
        $usuariosList = User::all();
        return view('administrador.admin', ['categoriasCont'=>$categoriasList], ['usuariosCont'=>$usuariosList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $newcategoria = new categoria();
        $newcategoria->nombre=$request->get('nombCa');
        $newcategoria->descripcion=$request->get('descCa');
        if($request->hasFile('imagCa')){
            $imagen=$request->file('imagCa');
            $nombreimagen=Str::slug($request->get('nombCa')).".".$imagen->guessExtension();
            $ruta=public_path('image_categoria/');
            $imagen->move($ruta,$nombreimagen);
            $newcategoria->imagen=$nombreimagen;
        }
        $newcategoria->save();
        return redirect('/administrador');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eliminar = categoria :: findOrFail($id);
        return view ('administrador.delete', ['categoriaeli'=>$eliminar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cateEdit = categoria:: findOrFail($id);
        return view ('administrador.edit', ['cateEditar'=>$cateEdit]);
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
        $cateedita = categoria :: findOrFail($id);
        $cateedita->nombre=$request->get('nombCaE');
        $cateedita->descripcion=$request->get('descCaE');
        if($request->hasFile('imagCaE')){
            $imagen=$request->file('imagCaE');
            $nombreimagen=Str::slug($request->get('nombCaE')).".".$imagen->guessExtension();
            $ruta=public_path('image_categoria/');
            $imagen->move($ruta,$nombreimagen);
            $cateedita->imagen=$nombreimagen;
        }
        $cateedita->save();
        return redirect('/administrador');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $elimicate =categoria::findOrFail($id);
        $elimicate -> delete();
        return redirect('/administrador');
    }

    public function destroy1($id)
    {
        $elimausu =User::findOrFail($id);
        $elimausu -> delete();
        return redirect('/administrador');
    }
    public function show1($id)
    {
        $eliminarusu = User :: findOrFail($id);
        return view ('administrador.deleteusu', ['usuarioeli'=>$eliminarusu]);
    }
}
