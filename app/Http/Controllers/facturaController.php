<?php

namespace App\Http\Controllers;

use App\Models\factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class facturaController extends Controller
{
    public function mostrar($id)
    {
        $factura = factura::findOrFail($id); 

        return view('principal.facturas', ['factura'=>$factura]);
    }
}
