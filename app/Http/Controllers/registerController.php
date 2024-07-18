<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\register;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
            'password_confirmation'=>'required|string|min:6|same:password',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ],[
            'name.required'=>'el nombre es requerido',
            'email.required'=>'el email es requerido',
            'email.unique'=>'el email ya fue usado,inicia sesion',
            'password.required'=>'la contraseña es requerida',
            'password.min'=>'la contraseña debe tener por lo menos 6 caracteres',
            'password_confirmation.min'=>'la contraseña debe tener por lo menos 6 caracteres',
            'password_confirmation.required'=>'este campo es requerido',
            'password_confirmation.same'=>'no es la misma contraseña',
            'foto.image' => 'El archivo debe ser una imagen',
            'foto.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg, gif, o svg',
            'foto.max' => 'La imagen no debe ser mayor de 2048 kilobytes'
        ],);
    

        $usuario = new User();
        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
        $usuario->password = bcrypt($request->get('password'));
        $usuario->num_cedula=$request->get('cedula');
        $usuario->direccion=$request->get('dire');
        $usuario->numero_telefono=$request->get('numT');
        $usuario->municipio=$request->get('muni');
        if($request->hasFile('foto')){
            $imagen=$request->file('foto');
            $nombreimagen=Str::slug($request->get('name')).".".$imagen->guessExtension();
            $ruta=public_path('image_perfil/');
            $imagen->move($ruta,$nombreimagen);
            $usuario->foto_perfil=$nombreimagen;
        }else {
            return back()->withErrors(['foto' => 'La imagen es requerida']);
        }
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
        $eliminarusu = User :: findOrFail($id);
        return view ('administrador.deleteusu', ['usuarioeli'=>$eliminarusu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $usuarioActualizar = User::findOrFail($id);
        $usuarioActualizar->name = $request->get('nameAc');
        $usuarioActualizar->municipio = $request->get('muniAc');
        $usuarioActualizar->numero_telefono = $request->get('numTAc');
        $usuarioActualizar->direccion = $request->get('direAc');

        if($request->hasFile('fotoAc')){
            $imagen = $request->file('fotoAc');
            $nombreimagen = Str::slug($request->get('nameAc')) . "." . $imagen->guessExtension();
            $ruta = public_path('image_perfil/');
            $imagen->move($ruta, $nombreimagen);
            $usuarioActualizar->foto_perfil = $nombreimagen;
        }
        $usuarioActualizar->save();

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
        $elimausu =User::findOrFail($id);
        $elimausu -> delete();
        dd($elimausu);
    }
}
