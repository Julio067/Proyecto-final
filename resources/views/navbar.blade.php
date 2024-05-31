<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="#" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Agroapp</title>
        <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    </head>
    <body>
        <header class="header">
            <div class="container-logo">
                <h1 class="logo"><a href="/agroapp">AGRO<b>APP</b></a></h1>
            </div>
            
            <div class="service">
                <div class="btn"><a href="/iniciar-sesion">Iniciar sesion</a></div>
            </div>
            <div class="service">
                <div class="btn-register"><a href="/registro">Registrarse</a></div>
            </div>
        </header>

        @yield('content')

		<script
			src="https://kit.fontawesome.com/81581fb069.js"
			crossorigin="anonymous"
		></script>
    </body>
</html>