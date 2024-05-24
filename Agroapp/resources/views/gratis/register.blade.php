@extends('navbar')
@section ('content')

<div class="content">
    <div class="container-login">
        <div class="wrap-login">
            <form action="/registro" method="post">
            @csrf
            <center>
                <h1>Registrate</h1>
                <br>
                <h4>Llena todos los campos de informacion</h4>
            </center>
                <div class="wrap-input100">
                    <input class="input100" type="text" name="name" placeholder="Nombre de usuario">
                    <span class="focus-efecto"></span>
                </div>
                            
                <div class="wrap-input100">
                    <input class="input100" type="email" name="email" placeholder="Correo">
                    <span class="focus-efecto"></span>
                </div>

                <div class="wrap-input100">
                    <input class="input100" type="password" name="password" placeholder="Contraseña">
                    <span class="focus-efecto"></span>
                </div>
                            
                <div class="wrap-input100">
                    <input class="input100" type="password" name="password_confirmation" placeholder="Confirmar contraseña">
                    <span class="focus-efecto"></span>
                </div>
    
                <div class="o-confirmacion">
                    <center><input type="checkbox" onclick="agreesubmit(this)" style="margin-right: 15px;"/>Estoy de acuerdo con los <a href="terminos.html" target="_blank" class="enlace-terminos">términos y condiciones</a></center>
                </div>
        
                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
						<a href=""><button type="submit" name="submit" class="login-form-btn">Registrarse</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
