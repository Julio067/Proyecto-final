@extends('plantilla')
@section ('content')
@role('admin')
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

<center><h1 class="heading-1">Actualizar categoria</h1></center>
<div class="contenedor-formP"> 
    <form action="/administrador/{{$cateEditar->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label>Nombre</label>
            <select class="form-select" type="text" aria-label="Default select example" name="nombCaE">
                <option value="{{$cateEditar->nombre}}">{{$cateEditar->nombre}}</option>
                <option value="Fruta">Fruta</option>
                <option value="Verdura">Verdura</option>
                <option value="Legumbre">Legumbre</option>
                <option value="Lacteos">Lacteos</option>
                <option value="Artesanales">Artesanales</option>
                <option value="Granos">Granos</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Descripcion</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{$cateEditar->descripcion}}" name="descCaE">
        </div>
        <div class="mb-3">
            <label class="">Imagen</label>
            <input type="file" class="form-control" id="exampleInputPassword1" name="imagCaE">
        </div>
        <center>
            <a href="/administrador"><button type="button" class="btn btn-secondary" style="--bs-btn-padding-y: 10px; --bs-btn-padding-x: 15px; --bs-btn-font-size: 15px;">cancelar</button></a>
            <button type="sumbit" class="btn btn-success" style="--bs-btn-padding-y: 10px; --bs-btn-padding-x: 15px; --bs-btn-font-size: 15px;">Enviar</button>
        </center>
    </form>
</div>
@endrole
@endsection