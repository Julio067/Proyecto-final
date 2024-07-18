@auth
@extends('plantilla_admin')
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

<center><h1 class="heading-1">Registrar nueva categoria</h1></center>
<div class="container mb-3">
    <form action="/administrador" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-2">
            <label>Nombre</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="nombCa">
        </div>
        <div class="mb-3">
            <label>Descripcion</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="descCa">
        </div>
        <div class="mb-3">
            <label>Imagen</label>
            <input type="file" class="form-control" id="exampleInputPassword1" name="imagCa" require>
        </div>
        <center>
            <a href="/administrador"><button type="button" class="btn btn-secondary" style="--bs-btn-padding-y: 10px; --bs-btn-padding-x: 15px; --bs-btn-font-size: 15px;">cancelar</button></a>
            <button type="sumbit" class="btn btn-success" style="--bs-btn-padding-y: 10px; --bs-btn-padding-x: 15px; --bs-btn-font-size: 15px;">Crear</button>
        </center>
    </form>
</div>
@endsection
@endauth