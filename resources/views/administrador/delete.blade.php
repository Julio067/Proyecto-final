@extends('plantilla_admin')
@section('content')

<div class="container">
<center><h1 style="margin-top: 12px;" >¿Desea eliminar la categoria?</h1></center>
    <form action="/administrador/{{$categoriaeli->id}}" method="POST">
        @csrf
        @method('delete')
    <table class="table table-dark table-striped table-bordered mt-5">
        <thead>
            <tr style="text-align:center">
                <th>ID</th>
                <td>Nombre</td>
                <td>Descripcion</td>
            </tr>
        </thead>
            <tbody>
                <tr>
                    <th scope="row" >{{$categoriaeli->id}}</th>
                    <td>{{$categoriaeli->nombre}}</td>
                    <td>{{$categoriaeli->descripcion}}</td>
                </tr>
            </tbody>
    </table>
    <center>
        <a href="/administrador"><button type="button" class="btn btn-secondary" style="--bs-btn-padding-y: 10px; --bs-btn-padding-x: 15px; --bs-btn-font-size: 15px;">cancelar</button></a>  
        <button type="sumbit" class="btn btn-danger" style="--bs-btn-padding-y: 10px; --bs-btn-padding-x: 15px; --bs-btn-font-size: 15px;">Eliminar</button>   
    </center>
    </form>
    <br>
</div>

@endsection