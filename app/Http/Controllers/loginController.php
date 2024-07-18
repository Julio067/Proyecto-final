<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\login;
use App\Models\carrito;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gratis.login');
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
        $request->validate([
            'email' => 'required|email',
            'password'=>'required|string|min:6',
        ],[
            'email.required'=>'el email es requerido',
            'email.unique'=>'el email ya fue usado,inicia sesion',
            'password.required'=>'la contraseña es requerida',
            'password.min'=>'la contraseña debe tener por lo menos 6 caracteres',
        ],);
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect('/home');
        } else {
            return back()->withErrors(['invalid_credentials' => 'Usuario o contraseña no válidos']);
        }
    }
    protected function authenticated(Request $request, $user)
    {
        $cartCount = carrito::where('user_id', $user->id)->count();
        session(['cartCount' => $cartCount]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session()->forget('cartCount');
        return redirect('/');
    }
}
