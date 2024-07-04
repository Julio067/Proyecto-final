@extends('plantilla_admin')
@section('content')
<div class="container">
<center><h1 style="margin-top: 12px;" >¿Desea eliminar a este usuario?</h1></center>
    <form action="/administrador/{{$usuarioeli->id}}" method="POST">
        @csrf
        @method('delete')
    <table class="table table-dark table-striped table-bordered mt-5">
        <thead>
            <tr style="text-align:center">
                <th>ID</th>
                <td>Nombre</td>
                <td>Email</td>
                <td>Cedula</td>
                <td>Direccion</td>
                <td>Telefono</td>
                <td>Municipio</td>
            </tr>
        </thead>
            <tbody>
                <tr>
                    <th scope="row" >{{$usuarioeli->id}}</th>
                    <td>{{$usuarioeli->name}}</td>
                    <td>{{$usuarioeli->email}}</td>
                    <td>{{$usuarioeli->num_cedula}}</td>
                    <td>{{$usuarioeli->direccion}}</td>
                    <td>{{$usuarioeli->numero_telefono}}</td>
                    <td>{{$usuarioeli->municipio}}</td>
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