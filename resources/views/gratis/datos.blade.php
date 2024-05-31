@extends('navbar')
@section ('content')

<div class="content">
    <div class="container-login">
        <div class="wrap-login">
            <form action="/datos" method="post">
            @csrf
            <center>
                <h1>Llenar datos los campos</h1>
                <br>
            </center>
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
                    <input type="text" class="input100" name="foto">
                </div>
        
                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
						<button type="submit" name="submit" class="login-form-btn">Finalizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection