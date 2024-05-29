@extends('plantilla')
@section('content')

<form action="/usuario/{{$productoComprarV->id}}" method="POST">
<div class="contenedor-compra">
    <center><h1>Calculadora de compra</h1></center>
        <div class="form2">
            <div class="info-form">
                <p>Cantidad a comprar</p>
                <input type="number" id="precio" placeholder="Disponible {{$productoComprarV->cantidad}}" class="campo">
                <p>Metodo de pago</p>
                <div class="row">
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
                <input type="text" id="cant" class="campo">
                <p>Correo</p>
                <input type="email" id="cant" class="campo">
                <button type="submit" onclick="calcular()" class="btn-enviar">Calcular</button>
            </div>
            
            <div class="result">
                <p>Valor de la compra x Unidad</p>
                <h1 class="text" id="res">{{$productoComprarV->precio}}</h1>
                <p>Cantidad a compra</p>
                <h1 class="text" id="total">0.00</h1>
                <p>Total</p>
                <h1 class="text" id="result">0.00</h1>
                <br>
                <button type="button" id="reset" class="btn-enviar">Comprar</button>
            </div>
        </div>
    </div>
</form>
@endsection