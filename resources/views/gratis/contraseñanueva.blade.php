@extends('navbar')
@section ('content')

        <div class="content_box">
            <div class="content">
                <div class="container-login">
                    <div class="wrap-login">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <center>
                                <div class="input10">
                                    <div class="uno">Ingresar nueva contraseña</div>
                                    <br>
                                    <div class="dos">Llena todos los campos de informacion</div>
                                </div>
                            </center>
                            @error('invalid_credentials')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror    
                            <div class="wrap-input100">
                                <input id="email" class="input100" type="email" name="email" placeholder="Correo" :value="old('email', $request->email)" required autofocus />
                                <span class="focus-efecto"></span>
                            </div>
                            @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror 
                            <div class="wrap-input100">
                                <input id="password" class="input100" type="password" placeholder="Contraseña" name="password" required />
                                <span class="focus-efecto"></span>
                            </div>
                            @error('password')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror 
                            <div class="wrap-input100">
                                <input id="password_confirmation" class="input100" type="password" placeholder="Confirmar contraseña" name="password_confirmation" required />
                                <span class="focus-efecto"></span>
                            </div>
                            @error('password')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror 
            
                            <div class="container-login-form-btn">
                                <div class="wrap-login-form-btn">
                                    <div class="login-form-bgbtn"></div>
                                    <button type="submit" name="submit" class="login-form-btn">Restablecer contraseña</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
@endsection