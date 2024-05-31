@auth
@extends('plantilla')
@section ('content')
    @if ($errors->any())
    <div class="container">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <center>
                <strong>UPPSS!</strong> Parece que incumpliste las siguientes normas.
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </center>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

<center><h1 class="heading-1">Ingreso de nuevo producto</h1></center>
<div class="contenedor-formP">
    <form action="/usuario" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-2">
            <label class="">Nombre del producto</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="nomb">
        </div>
        <div class="mb-3">
            <label class="">Descripcion</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="desc">
        </div>
        <div class="mb-3">
            <label class="">Precio</label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="prec">
        </div>
        <div class="mb-3">
            <label>Cantidad</label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="cant">
        </div>
        <div class="mb-3">
            <label>Categoria</label>
            <select class="form-select" type="text" aria-label="Default select example" name="cate">
                <option selected>Seleccione la categoria del producto</option>
                <option value="Fruta">Fruta</option>
                <option value="Verdura">Verdura</option>
                <option value="Legumbre">Legumbre</option>
                <option value="Lacteos">Lacteos</option>
                <option value="Artesanales">Artesanales</option>
                <option value="Granos">Granos</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Medida</label>
            <select class="form-select" type="text" aria-label="Default select example" name="medi">
                <option selected>Medida que usara para vender el producto</option>
                <option value="Kilos">Kilos</option>
                <option value="Libra">LIbra</option>
                <option value="Bultos">Bultos</option>
                <option value="Onzas">Onzas</option>
                <option value="Litros">Litros</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="">Imagen</label>
            <input type="file" class="form-control" id="exampleInputPassword1" name="imag">
        </div>
        <center>
        <a href="/usuario"><button type="button" class="btn btn-secondary">cancelar</button></a>
        <button type="sumbit" class="btn btn-success">Enviar</button>
        </center>
    </form>
</div>

@endsection
@endauth