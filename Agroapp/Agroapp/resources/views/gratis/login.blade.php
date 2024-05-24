@extends('navbar')
@section ('content')

        <div class="content_box">
            <div class="content">
                <div class="container-login">
                    <div class="wrap-login">
                        <center>
                            <h1>Inicia sesion</h1>
                            <br>
                            <h4>Llena todos los campos de informacion</h4>
                        </center>
                        <div class="wrap-input100">
                            <input class="input100" type="text" placeholder="Usuario">
                            <span class="focus-efecto"></span>
                        </div>
                            
                        <div class="wrap-input100">
                            <input class="input100" type="password" placeholder="Contraseña">
                            <span class="focus-efecto"></span>
                        </div>
    
                        <div class="o-password">
                            <a href="contra.html">Olvide mi contraseña</a>
                        </div>
        
                        <div class="container-login-form-btn">
                            <div class="wrap-login-form-btn">
                                <div class="login-form-bgbtn"></div>
                                <a href="/home"><button type="submit" name="submit" class="login-form-btn">Iniciar sesion</button></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
@endsection
