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
    <link rel="stylesheet" href="{{ asset('css/styles-home.css') }}">
	</head>
	<body>
		<header>
			<div class="container-header">
				<div class="container header">
					<div class="container-logo">
						<h1 class="logo">AGRO<b>APP</b></h1>
					</div>
				</div>
			</div>
		</header>

        <main class="main-content">
            <h1 class="heading-1">Bienvenido a la bandeja de administracion</h1>
            <p class="heading-1">¿Que haremos el dia de hoy?</p>
            <div class="container">
                <div class="row2">
                    <div class="service">
                        <i class="fa-solid fa-users"></i>
                        <h2>Revisar usuarios</h2>
                    </div>
                    <div class="service">
                        <i class="fa-solid fa-list"></i>
                        <h2>Revisar categorias</h2>
                    </div>
                </div>

                <div class="content_box">
                    <div class="content">
                        <h1 class="heading-1">Usuarios</h1>
                        <table class="table table-dark table-striped table-bordered">
                            <thead>
                                <tr style="text-align:center">
                                    <th>ID</th>
                                    <td>Nombre</td>
                                    <td>Email</td>
                                    <td>Numero de cedula</td>
                                    <td>Direccion</td>
                                    <td>Numero de telefono</td>
                                    <td>Municipio</td>
                                    <td>Eliminar</td>
                                </tr>
                            </thead>
                            @foreach($usuariosCont as $usuariosVist)
                            <tbody>
                                <th scope="row" style="margin: auto;">{{$usuariosVist->id}}</th>
                                <td>{{$usuariosVist->name}}</td>
                                <td>{{$usuariosVist->email}}</td>
                                <td>{{$usuariosVist->num_cedula}}</td>
                                <td>{{$usuariosVist->direccion}}</td>
                                <td>{{$usuariosVist->numero_telefono}}</td>
                                <td>{{$usuariosVist->municipio}}</td>
                                <td style="text-align:center">
                                    <form action="/registro/{{$usuariosVist->id}}" method="post">
                                        @csrf
                                        @method('get')
                                        <button class="btn btn-danger" ><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tbody>
                            @endforeach
                        </table>
                    </div>

                    
                    <div class="content">
                        <center><h1 class="heading-1">Categorias</h1></center>
                        <table class="table table-dark table-striped table-bordered">
                            <thead>
                                <tr style="text-align:center">
                                    <th>ID</th>
                                    <td>Nombre</td>
                                    <td>Descripcion</td>
                                    <td>Imagen</td>
                                    <td>Editar</td>
                                    <td>Eliminar</td>
                                </tr>
                            </thead>
                            @foreach($categoriasCont as $categoriasVist)
                            <tbody>
                                <th scope="row" style="margin: auto;">{{$categoriasVist->id}}</th>
                                <td>{{$categoriasVist->nombre}}</td>
                                <td>{{$categoriasVist->descripcion}}</td>
                                <td>{{$categoriasVist->imagen}}</td>
                                <td style="text-align:center">
                                    <a href="/administrador/{{$categoriasVist->id}}/edit"><button type="button" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                </td>
                                <td style="text-align:center">
                                    <form action="/administrador/{{$categoriasVist->id}}" method="post">
                                        @csrf
                                        @method('get')
                                        <button class="btn btn-danger" ><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tbody>
                            @endforeach
                        </table>
                    </div>

                    
                </div>
                <center>
                    <div class="btn-usuario">
                        <a href="administrador/create"><button>Crear nueva categoria</button></a>
                    </div>
                </center>
            </div>
        </main>

		<footer class="pie-pagina">
      		<div class="grupo-2">
        		<small>&copy; 2024 <b>SENAAPP</b> - Todos los derechos reservados, las imagenes y/o videos usados en esta pagina son usadas son propias del SENA</small>
			</div>
		</footer>
        <script src="{{ asset('js/usuario.js') }}"></script>
	</body>
</html>
@endrole