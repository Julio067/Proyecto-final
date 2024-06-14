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
            
            <div class="service">
                <div class="btn"><a href="/iniciar-sesion">Iniciar sesion</a></div>
            </div>
            <div class="service">
                <div class="btn-register"><a href="/registro">Registrarse</a></div>
            </div>
        </header>

		<main class="main-content">
            <section class="carrusel">
                <h1 class="heading-1">Mejores Categorías</h1>
                <div class="categorias-list" id="slick-list">
                    <button class="flecha izquierda" id="button-prev" data-button="button-prev" onclick="app.processingButton(event)">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" class="svg-inline--fa fa-chevron-left fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path></svg>
                    </button>
                    <div class="categorias-deslizar" id="track">
                        @foreach($categoriasCont as $categoriasVist)
                        <div class="categoria">
                            <div>
                                <a href="/">
                                    <h4><small>{{$categoriasVist->descripcion}}</small>{{$categoriasVist->nombre}}</h4>
                                    <picture>
                                        <img src="image_categoria/{{$categoriasVist->imagen}}" alt="Image">
                                    </picture>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="flecha derecha" id="button-next" data-button="button-next" onclick="app.processingButton(event)">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" class="svg-inline--fa fa-chevron-right fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg>
                    </button>
                </div>
            </section>

            <h1 class="heading-1" style="margin-bottom: 20px;">Productos recientes</h1>
            <section class="container cards">
                <div class="cards">
                @foreach($productosCont as $productosVist)
                    <div class="cards-cuerpo">
                        <div class="cards-img">
                            <img src="image_creada/{{$productosVist->imagen}}" alt="">
                        </div>
                        <h2>{{$productosVist->nombre}}</h2>
                        <h3>{{$productosVist->descripcion}}</h3>
                        <p>Cantidad: {{$productosVist->cantidad}} | Medida: {{$productosVist->medida}} | Categoria: {{$productosVist->categoria}}</p>
                        <h2>$ {{$productosVist->precio}}</h2>
                        <form action="/carrito/{{$productosVist->id}}" method="post">
                            @csrf
                            @method('get')
                            <button><i class="fa-solid fa-cart-shopping"></i></button>
                        </form>
                        <!--<form action="/home/{{$productosVist->id}}" method="post">
                            @csrf
                            @method('get')
                            <button><i class="fa-solid fa-cart-shopping"></i></button>
                        </form>-->
                    </div>

                </div>
                @endforeach
            </section>

            <section class="contactanos">
                <h1 class="heading-1">Contactanos</h1>
                <div class="form">
                    <div class="info-form">
                        <p>Contactenos y con gusto le atenderemos y le ofreceremos un servicio de calidad</p>
                        <a href="tel:3102931271" class="btnllamar" onclick="return(navigator.userAgent.match(/Android | iPhone | movile /i)) != null;"><i class="fa-solid fa-phone"></i>+57 3102931271</a>
                        <a href="#"><i class="fa-solid fa-envelope"></i>altransportes.jg@gmail.com</a>
                        <a href="https://wa.me/573102931271?text=Hola%20necesito%20ayuda"><i class="fa-brands fa-whatsapp"></i>+57 3102931271</a>
                        <a href="https://maps.app.goo.gl/ZU8PpVdFVrk6PxrE9"><i class="fa-solid fa-map"></i>Cra. 85c #25c-21, Bogotá</a>
                    </div>
                    <form action="https://formsubmit.co/julioguzmanortiz97@gmail.com" autocomplete="off" method="POST">
                        <input type="text" name="name" id="name" placeholder="Escribe tu nombre" class="campo">
                        <input type="email" name="email" name="email" placeholder="Escribe tu correo" class="campo">
                        <input type="text" name="subject" name="subject" placeholder="Escribe el asunto" class="campo">
                        <textarea name="coments" id="coments" placeholder="Escribe tu mensaje..."></textarea>
                        <center><input type="submit" name="enviar" class="btn-enviar"></center>
                        <input type="hidden" name="_next" value="http://127.0.0.1:5500/">
                        <input type="hidden" name="_captcha" value="false">
                    </form>
                </div>
            </section>
        </main>

		<footer class="pie-pagina">
			<div class="grupo-2">
				<small>&copy; 2024 <b>SENAAPP</b> - Todos los derechos reservados, las imagenes y/o videos usados en esta pagina son usadas son propias del SENA</small>
			</div>
		</footer>
		<script
			src="https://kit.fontawesome.com/81581fb069.js"
			crossorigin="anonymous"
		></script>
	</body>
</html>
