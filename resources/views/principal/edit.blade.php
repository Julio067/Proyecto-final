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

<center><h1 class="heading-1">Actualizar producto</h1></center>
<div class="contenedor-formP"> 
    <form action="/usuario/{{$productoEditarV->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 mt-2">
            <label>Nombre del producto</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{$productoEditarV->nombre}}" name="nombEd">
        </div>
        <div class="mb-3">
            <label>Descripcion</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{$productoEditarV->descripcion}}" name="descEd">
        </div>
        <div class="mb-3">
            <label>Precio</label>
            <input type="number" class="form-control" id="exampleInputPassword1" value="{{$productoEditarV->precio}}" name="precEd">
        </div>
        <div class="mb-3">
            <label>Cantidad</label>
            <input type="number" class="form-control" id="exampleInputPassword1" value="{{$productoEditarV->cantidad}}" name="cantEd">
        </div>
        <div class="mb-3">
            <label>Categoria</label>
            <select class="form-select" type="text" aria-label="Default select example" name="cateEd">
                <option value="{{$productoEditarV->categorias_id}}">{{$productoEditarV->categorias_id}}</option>
                @foreach($categoriaEditarV as $categoriaEditarVist)
                <option value="{{ $categoriaEditarVist->id }}">{{ $categoriaEditarVist->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Medida</label>
            <select class="form-select" type="text" aria-label="Default select example" name="mediEd">
                <option value="{{$productoEditarV->medida}}" selected>{{$productoEditarV->medida}}</option>
                <option value="Unidad">Unidad</option>
                <option value="Kilos">Kilos</option>
                <option value="LIbra">Libra</option>
                <option value="Bultos">Bultos</option>
                <option value="Onzas">Onzas</option>
                <option value="Litros">Litros</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="">Imagen</label>
            <input type="file" class="form-control" id="exampleInputPassword1" name="imagEd">
        </div>
        <center>
            <a href="/administrador"><button type="button" class="btn btn-secondary" style="--bs-btn-padding-y: 10px; --bs-btn-padding-x: 15px; --bs-btn-font-size: 15px;">cancelar</button></a>
            <button type="sumbit" class="btn btn-success" style="--bs-btn-padding-y: 10px; --bs-btn-padding-x: 15px; --bs-btn-font-size: 15px;">Enviar</button>
        </center>
    </form>
</div>

@endsection