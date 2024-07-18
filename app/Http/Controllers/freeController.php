<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\categoria;

class freeController extends Controller
{
    protected $NUMBER_PAGES = 50;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos = producto::all();
        $categorias = categoria::all();
        $search_value=$request->search_value;
        $productos = producto::search($search_value)->orderBy('id', 'desc')->Paginate($this->NUMBER_PAGES)->withQueryString();
        return view('gratis.agroapp', ['productosCont'=>$productos], ['categoriasCont'=>$categorias]);
    }
}
