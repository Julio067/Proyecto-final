<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<title>Agroapp</title>
		<link rel="icon" href="{{ URL::asset('img/logo.png') }}">
        <link rel="stylesheet" href="{{ asset('css/appbarfree.css') }}">
	</head>
	<body>
        <header class="header">
            <div class="container-logo">
                <h1 class="logo"><a href="/agroapp">AGRO<b>APP</b></a></h1>
            </div>
            @guest
            <div class="service">
                <div class="btn"><a href="/iniciar-sesion">Iniciar sesion</a></div>
            </div>
            <div class="service">
                <div class="btn-register"><a href="/registro">Registrarse</a></div>
            </div>
			@else
			<form action="{{ route('logout') }}" method="POST">
                @csrf
                <div class="service">
                	<div class="btn-salir"><button type='submit'>Cerrar sesion</button></div>
            	</div>
            </form>
			<div class="service">
			<div class="btn"><a href="/home">Cancelar</a></div>
            </div>
			@endguest
        </header>

		@yield('content')

		<footer class="pie-pagina">
			<div class="grupo-2">
				<small>&copy; 2024 <b>SENAAPP</b> - Todos los derechos reservados, las imagenes y/o videos usados en esta pagina son usadas son propias del SENA</small>
			</div>
		</footer>
		<script src="{{ asset('js/home.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
	</body>
</html>