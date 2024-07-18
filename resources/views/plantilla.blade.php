<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<title>Agroapp</title>
		<link rel="icon" href="{{ URL::asset('img/logo.png') }}">
    	<link rel="stylesheet" href="{{ asset('css/styles-home.css') }}">
	</head>
	<body>
		<header class="header">
			<div class="container-logo">
				<h1 class="logo"><a href="/home">AGRO<b>APP</b></a></h1>
			</div>
			
			<div class="container-user">
				<a href="/usuario"><i class="fa-solid fa-user"></i></a>
				<a href="/carrito"><i class="fa-solid fa-cart-shopping"></i></a>
			<div class="content-shopping-cart">
				<span class="text">Carrito</span>
				<span class="number">{{ session('cartCount', 0) }}</span>
			</div>
		</header>
		<div class="container-navbar">
			<nav class="navbar container">
				<form class="search-form" action="/" method="get">
					<input type="text" name="search_value" value="{{ old('search_value', request()->search_value) }}" placeholder="Buscar..." />
					<button class="btn-search" type="submit">
						<i class="fa-solid fa-magnifying-glass"></i>
					</button>
				</form>
			</nav>
		</div>

    	@yield('content')
		<footer class="pie-pagina">
      		<div class="grupo-2">
        		<small>&copy; 2024 <b>AGROAPP</b> - Todos los derechos reservados, las imagenes y/o videos usados en esta pagina son usadas son propias del SENA</small>
			</div>
		</footer>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script src="{{ asset('js/usuario.js') }}"></script>
		<script src="{{ asset('js/home.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
	</body>
</html>
