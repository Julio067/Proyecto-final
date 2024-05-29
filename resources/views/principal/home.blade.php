@extends('plantilla')
@section ('content')
@auth
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
				<p>Cantidad: {{$productosVist->cantidad}}</p>
				<h2>{{$productosVist->precio}}</h2>

				
				<form action="/comprar/{{$productosVist->id}}" method="post">
                    @csrf
                    @method('get')
                    <button><i class="fa-solid fa-cart-shopping"></i></button>
                </form>
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
@endauth
@endsection
