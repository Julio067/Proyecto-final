@role('admin')
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="icon" href="{{ URL::asset('img/logo.png') }}">
		<title>Agroapp</title>
        <link rel="icon" href="{{ URL::asset('img/logo.png') }}">
        <link rel="stylesheet" href="{{ asset('css/styles-home.css') }}">
	</head>
	<body>
        <header class="header">
            <div class="container-logo">
                <h1 class="logo"><a href="/agroapp">AGRO<b>APP</b></a></h1>
            </div>
        </header>

        @yield('content')

		<footer class="pie-pagina">
      		<div class="grupo-2">
        		<small>&copy; 2024 <b>AGROAPP</b> - Todos los derechos reservados, las imagenes y/o videos usados en esta pagina son usadas son propias del SENA</small>
			</div>
		</footer>
        <script src="{{ asset('js/usuario.js') }}"></script>
	</body>
</html>
@endrole