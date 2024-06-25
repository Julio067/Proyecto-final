@extends('plantilla')
@section('content')

<div class="contenedor-compra">
    <center>
        <h1>Pasarela de pago</h1>
        <p style="color: white;">Estas a unos pasos de finalizar tu compra por favor  completa todos los campos</p>
    </center>
        <div class="form2">
            <div class="info-form">
                <div class="row1">
                    <button onclick="Valor('0')" class="pago" id="tip">
                        <h3>Nequi</h3>
                    </button>
                    <button onclick="Valor('5')" class="pago" id="tip">
                        <h3>Daviplata</h3>
                    </button>
                    <button onclick="Valor('10')" class="pago" id="tip">
                        <h3>Bancolombia</h3>
                    </button>
                    <button onclick="Valor('15')" class="pago" id="tip">
                        <h3>Caja social</h3>
                    </button>
                    <button onclick="Valor('25')" class="pago" id="tip">
                        <h3>Efecty</h3>
                    </button>
                    <button onclick="Valor('50')" class="pago" id="tip">
                        <h3>VISA</h3>
                    </button>
                </div>
                <p>Direccion</p>
                <input type="text" class="campo">
                <p>Especificaciones</p>
                <input type="text" class="campo">
                <p>Codigo postal</p>
                <input type="number" class="campo">
                <a href="/carrito"><button type="button" class="btn-enviar">Cancelar</button></a>
            </div>
            
            @foreach($cart as $id => $detalles)
            <div class="result">
                <p>Valor de la compra x Unidad</p>
                <h1 class="text" id="precio">{{ $detalles['precio'] }}</h1>
                <p>Cantidad a compra</p>
                <h1 class="text" id="canti">{{ $detalles['cantidad'] }}</h1>
                <p>Total</p>
                <h1 class="text" id="result">{{ $total }}</h1>
                <br>
                <form action="{{ route('carrito.comprar') }}" method="POST" class="m-3">
                    @csrf
                    <button type="sumbit" class="btn-enviar">Comprar</button></a>
                </form>
            </div>
            @endforeach
        </div>
    </div>


@endsection