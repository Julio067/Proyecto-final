<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<title>Agroapp</title>
    <link rel="stylesheet" href="{{ asset('css/styles-home.css') }}">
	</head>
	<body>
		<header>
			<div class="container-header">
				<div class="container header">
					<div class="container-logo">
						<a href="/home"><h1 class="logo">AGRO<b>APP</b></h1></a>
					</div>

					<div class="container-user">
						<a href="/usuario"><i class="fa-solid fa-user"></i></a>
						<a href="/usuario"><i class="fa-solid fa-basket-shopping"></i></a>
						<div class="content-shopping-cart">
							<span  class="text">Carrito</span>
							<span class="number">(0)</span>
						</div>
					</div>
				</div>
			</div>

			<div class="container-navbar">
				<nav class="navbar container">

					<form class="search-form">
						<input type="search" placeholder="Buscar..." />
						<button class="btn-search">
							<i class="fa-solid fa-magnifying-glass"></i>
						</button>
					</form>
				</nav>
			</div>
		</header>

    @yield('content')

		<footer class="pie-pagina">
      <div class="grupo-2">
        <small>&copy; 2024 <b>SENAAPP</b> - Todos los derechos reservados, las imagenes y/o videos usados en esta pagina son usadas son propias del SENA</small>
      </div>
    </footer>
		<script
			src="https://kit.fontawesome.com/81581fb069.js"
			crossorigin="anonymous"
		></script>
		<script src="{{ asset('js/usuario.js') }}"></script>
		<script src="{{ asset('js/comprar.js') }}"></script>
	</body>
</html>
