@extends('plantilla')
@section('content')
<h1 class="heading-1">Detalles de la factura</h1>
<div class="contenedor-formP">
    <div class="card">
        <div class="card-body">
            <center><h5 class="card-title">Factura #{{ $factura->id }}</h5></center>
            <p class="card-text"><strong>Fecha:</strong> {{ $factura->created_at }}</p>
            <p class="card-text"><strong>Nombre: </strong>{{ $factura->usuario->name }}</p>
            <p class="card-text"><strong>Correo:</strong> {{ $factura->correo }}</p>
            <p class="card-text"><strong>Dirección:</strong> {{ $factura->direccion }}</p>
            <p class="card-text"><strong>Código Postal:</strong> {{ $factura->codigo_postal }}</p>
            <p class="card-text"><strong>Método de Pago:</strong> {{ $factura->metodo_pago }}</p>
            <p class="card-text"><strong>Producto:</strong> {{ $factura->producto->nombre }}</p>
            <p class="card-text"><strong>Cantidad:</strong> {{ $factura->cantidad_compra }}</p>
            <hr>
            <p class="card-text"><strong>Total: ${{ $factura->total }}</strong></p>
        </div>
    </div>
</div>
<Center>
    <div class="btn-usuario">
        <a href="/usuario"><button>Regresar</button></a>
    </div>
</Center>

@endsection