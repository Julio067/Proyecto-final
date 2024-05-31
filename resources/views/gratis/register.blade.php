@extends('navbar')
@section ('content')

<div class="content">
    <div class="container-login">
        <div class="wrap-login">
            <form action="/registro" method="post" >
            @csrf
            <center>
                <h1>Registrate</h1>
                <br>
                <h4>Llena todos los campos de informacion</h4>
            </center>
                <div class="wrap-input100">
                    <input class="input100" type="text" name="name" placeholder="Nombre y Apellido de usuario">
                    <span class="focus-efecto"></span>
                </div>
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror 
                <div class="wrap-input100">
                    <input class="input100" type="email" name="email" placeholder="Correo">
                    <span class="focus-efecto"></span>
                </div>
                @error('email')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="wrap-input100">
                    <input class="input100" type="password" name="password" placeholder="Contraseña">
                    <span class="focus-efecto"></span>
                </div>
                @error('password')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror            
                <div class="wrap-input100">
                    <input class="input100" type="password" name="password_confirmation" placeholder="Confirmar contraseña">
                    <span class="focus-efecto"></span>
                </div>
                @error('password_confirmation')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="wrap-input100">
                    <input class="input100" type="text" name="cedula" placeholder="Numero de cedula">
                    <span class="focus-efecto"></span>
                </div>
                <div class="wrap-input100">
                    <input class="input100" type="text" name="dire" placeholder="Direccion">
                    <span class="focus-efecto"></span>
                </div>
                <div class="wrap-input100">
                    <input class="input100" type="number" name="numT" placeholder="Numero de telefono">
                    <span class="focus-efecto"></span>
                </div>
                <div class="wrap-input100">
                    <select class="form-select" type="text" aria-label="Default select example" name="muni">
                        <option selected>Municipio</option>
                        <option value="Madrid">Madrid</option>
                        <option value="Mosquera">Mosquera</option>
                        <option value="Funza">Funza</option>
                        <option value="Facatativa">Facatativa</option>
                        <option value="Zipacon">Zipacon</option>
                        <option value="Bojaca">Bojaca</option>
                    </select>
                </div>
                <div class="wrap-input100">
                    <input type="file" class="input100" name="foto">
                </div>
                <div class="o-confirmacion">
                    <center><input type="checkbox" onclick="agreesubmit(this)" style="margin-right: 15px;"/>Estoy de acuerdo con los <a href="terminos.html" target="_blank" class="enlace-terminos">términos y condiciones</a></center>
                </div>
        
                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
						<button type="submit" name="submit" class="login-form-btn">Registrarse</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection