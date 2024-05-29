<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
		<title>Agroapp</title>
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
			<section class="container top-categories">
				<h1 class="heading-1">Mejores Categorías</h1>
				<div class="container-categories">
					<div class="card-category category-verduras">
						<p>Verduras</p>
						<span>Ver más</span>
					</div>
					<div class="card-category category-granos">
						<p>Granos</p>
						<span>Ver más</span>
					</div>
					<div class="card-category category-frutas">
						<p>Frutas</p>
						<span>Ver más</span>
					</div>
				</div>
			</section>

			<section class="container cards">
				<h1 class="heading-1">Productos recientes</h1>
				<div class="cards">
					<div class="cards-cuerpo">
						<div class="cards-img">
							<img src="{{ asset('img/fertilizante.jpg') }}" alt="">
						</div>
						<h3>1 bulto de papa pastuza</h3>
						<h2>$ 50.000</h2>
						<i class="fa-solid fa-cart-shopping"></i>
					</div>

					<div class="cards-cuerpo">
						<div class="cards-img">
							<img src="{{ asset('img/fertilizante.jpg') }}" alt="">
						</div>
						<h3>1 bulto de papa pastuza</h3>
						<h2>$ 50.000</h2>
						<i class="fa-solid fa-cart-shopping"></i>
					</div>

					<div class="cards-cuerpo">
						<div class="cards-img">
							<img src="{{ asset('img/fertilizante.jpg') }}" alt="">
						</div>
						<h3>1 bulto de papa pastuza</h3>
						<h2>$ 50.000</h2>
						<i class="fa-solid fa-cart-shopping"></i>
					</div>

					<div class="cards-cuerpo">
						<div class="cards-img">
							<img src="{{ asset('img/fertilizante.jpg') }}" alt="">
						</div>
						<h3>1 bulto de papa pastuza</h3>
						<h2>$ 50.000</h2>
						<i class="fa-solid fa-cart-shopping"></i>
					</div>

					<div class="cards-cuerpo">
						<div class="cards-img">
							<img src="{{ asset('img/fertilizante.jpg') }}" alt="">
						</div>
						<h3>1 bulto de papa pastuza</h3>
						<h2>$ 50.000</h2>
						<i class="fa-solid fa-cart-shopping"></i>
					</div>

					<div class="cards-cuerpo">
						<div class="cards-img">
							<img src="{{ asset('img/fertilizante.jpg') }}" alt="">
						</div>
						<h3>1 bulto de papa pastuza</h3>
						<h2>$ 50.000</h2>
						<i class="fa-solid fa-cart-shopping"></i>
					</div>
				</div>
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
