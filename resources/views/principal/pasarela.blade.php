@extends('plantilla')
@section('content')
@auth
<form action="{{ route('carrito.comprar', $item->producto_id) }}" method="POST" class="m-3">
    @csrf
    <div class="contenedor-compra">
        <center>
            <h1>Pasarela de pago</h1>
            <p style="color: white;">Estás a unos pasos de finalizar tu compra. Por favor, completa todos los campos.</p>
        </center>
        <div class="form2">
            <div class="info-form">
                <p>Metodo de Pago</p>
                <select name="metodo_pago" class="campo" type="text">
                    <option selected>Seleccione un metodo de pago</option>
                    <option value="Nequi">Nequi</option>
                    <option value="Daviplata">Daviplata</option>
                    <option value="Bancolombia">Bancolombia</option>
                    <option value="Visa">Visa</option>
                    <option value="Efecty">Efecty</option>
                </select>
                <p>Correo</p>
                <input name="correo" type="text" class="campo" value="{{ Auth::user()->email}}">
                <p>Dirección</p>
                <input name="direccion" type="text" class="campo" value="{{ Auth::user()->direccion}}">
                <p>Especificaciones</p>
                <input type="text" class="campo" placeholder="Apartamento, torre, barrio...">
                <p>Código Postal</p>
                <input name="codigo_postal" type="number" class="campo" placeholder="El codigo postal de la ciudad de origen">
                <a href="{{ route('carrito') }}"><button type="button" class="btn-enviar">Cancelar</button></a>
            </div>
    
            <div class="result">
                <p>Valor de la compra x Unidad</p>
                <h1 class="text" id="precio">{{ $item->producto->precio }}</h1>
                <p>Cantidad a comprar</p>
                <h1 class="text" id="canti">{{ $item->cantidad }}</h1>
                <p>Total</p>
                <h1 class="text" id="result">{{ $total }}</h1>
                <br>
                <button type="submit" class="btn-enviar">Comprar</button>
            </div>
        </div>
    </div>
</form>
@endauth
@endsection
