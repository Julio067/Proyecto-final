@extends('plantilla')
@section('content')

<div class="container">
    <h1>Detalles de la Factura</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Factura #{{ $factura->id }}</h5>
            <p class="card-text">Cliente: {{ $factura->usuario->name }}</p>
            <p class="card-text">Producto: {{ $factura->producto->nombre }}</p>
            <p class="card-text">Total: ${{ $factura->total }}</p>
            <p class="card-text">Fecha de emisión: {{ $factura->created_at }}</p>
        </div>
    </div>
</div>

@endsection

