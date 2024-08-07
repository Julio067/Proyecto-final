<?php

namespace App\Http\Controllers;

use App\Models\venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ventaController extends Controller
{
    public function misVentas()
    {
        $ventas = Venta::where('cliente_id', Auth::id())->with('cliente', 'producto')->get();

        return view('ventas.misVentas', compact('ventas'));
    }
}