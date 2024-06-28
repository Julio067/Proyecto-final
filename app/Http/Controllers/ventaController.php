<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
{
    public function misVentas()
    {
        $ventas = Venta::where('cliente_id', Auth::id())->with('cliente', 'producto')->get();

        return view('ventas.misVentas', compact('ventas'));
    }
}