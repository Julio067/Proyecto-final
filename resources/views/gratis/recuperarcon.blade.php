@extends('navbar')
@section ('content')

        <div class="content_box">
            <div class="content">
                <div class="container-login">
                    <div class="wrap-login">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <center>
                                <div class="input10">
                                    <div class="uno">Recuperar contraseña</div>
                                    <br>
                                    <div class="dos">Llena el campo de informacion, con un correo registrado</div>
                                </div>
                            </center>
                            @error('invalid_credentials')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror    
                            <div class="wrap-input100">
                                <span class="focus-efecto"></span>
                                <x-input id="email" class="input100" type="email" name="email" placeholder="Correo" :value="old('email')" required autofocus />
                            </div>
                            @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror     
            
                            <div class="container-login-form-btn">
                                <div class="wrap-login-form-btn">
                                    <div class="login-form-bgbtn"></div>
                                    <button type="submit" name="submit" class="login-form-btn">Recuperar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
@endsection