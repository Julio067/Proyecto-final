<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\categoria;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    protected $NUMBER_PAGES = 50;

    public function index(Request $request)
    {
        $productos = producto::query();

        if ($request->has('categoria_id')) {
            $productos->where('categorias_id', $request->categoria_id);
        }

        // Aplicar búsqueda y ordenamiento como antes
        $search_value = $request->search_value;
        $productos = $productos->search($search_value)
                               ->orderBy('id', 'desc')
                               ->paginate($this->NUMBER_PAGES)
                               ->withQueryString();

        $categorias = categoria::all();

        return view('principal.home', [
            'productosCont' => $productos,
            'categoriasCont' => $categorias,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comprarP = producto:: findOrFail($id);
        return view ('principal.comprar', [
            'productoComprarV'=>$comprarP
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
