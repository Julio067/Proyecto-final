<?php

namespace App\Http\Controllers;

use App\Models\venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ventaController extends Controller
{
    public function misVentas()
    {
        $ventas = venta::where('comprador_id', Auth::id())->get();
        return view('principal.usuario', compact('ventas'));
    }
}
