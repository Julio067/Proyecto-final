<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\register;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class registerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gratis.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'name' => 'required|string|max:255:users,name',
            'email' => 'required|unique:users,email',
            'password'=>'required|string|min:6',
            'password_confirmation'=>'required|string|min:6|same:password'
        ],[
            'name.required'=>'el nombre es requerido',
            'email.required'=>'el email es requerido',
            'email.unique'=>'el email ya fue usado,inicia sesion',
            'password.required'=>'la contraseña es requerida',
            'password.min'=>'la contraseña debe tener por lo menos 6 caracteres',
            'password_confirmation.min'=>'la contraseña debe tener por lo menos 6 caracteres',
            'password_confirmation.required'=>'este campo es requerido',
            'password_confirmation.same'=>'no es la misma contraseña'
        ],);
    

        $usuario = new User();
        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
        $usuario->password = bcrypt($request->get('password'));
        $usuario->save();

        Auth::login($usuario);
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
