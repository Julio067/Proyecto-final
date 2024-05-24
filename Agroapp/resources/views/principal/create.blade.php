@extends('plantilla')
@section ('content')

var_dump('Holaaaa')
<center><h1 >Ingreso de nuevo producto</h1></center>
    <form action="/home" method="POST" enctype="multipart/form-data">>
        @csrf
        <div class="mb-3 mt-2">
            <label class="form-label font-weight-bold">Nombre del producto</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="nomb">
        </div>
        <div class="mb-3">
            <label class="form-label font-weight-bold">Descripcion</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="desc">
        </div>
        <div class="mb-3">
            <label class="form-label font-weight-bold">Precio</label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="prec">
        </div>
        <div class="mb-3">
            <label class="form-label font-weight-bold">Cantidad</label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="cant">
        </div>
        <div class="mb-3">
            <label class="form-label font-weight-bold">Imagen</label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="imag" accept="image/*">
        </div>
        <a href="/usario"><button type="button" class="btn btn-secondary">cancelar</button></a>
        <button type="sumbit" class="btn btn-primary">Enviar</button>
    </form>
    <br>

@endsection