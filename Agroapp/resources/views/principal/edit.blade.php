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
        <center>
            <a href="/usuario"><button type="button" class="btn btn-secondary">cancelar</button></a>
            <button type="sumbit" class="btn btn-success">Enviar</button>
        </center>
    </form>
</div>

@endsection