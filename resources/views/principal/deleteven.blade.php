@extends('plantilla')
@section('content')
<div class="container">
<center><h1 style="margin-top: 12px;" >¿Desea eliminar su venta?</h1></center>
    <form action="/usuario/{{$facturaeli->id}}" method="POST">
        @csrf
        @method('delete')
    <table class="table table-dark table-striped table-bordered mt-5">
        <thead>
            <tr style="text-align:center">
                <th>ID</th>
                <td>Cliente</td>
                <td>Producto</td>
                <td>Total</td>
                <td>Fecha de compra</td>
            </tr>
        </thead>
            <tbody>
                <tr>
                    <th scope="row" >{{$facturaeli->id}}</th>
                    <td>{{$facturaeli->user_id}}</td>
                    <td>{{$facturaeli->producto_id}}</td>
                    <td>{{$facturaeli->total}}</td>
                    <td>{{$facturaeli->created_at}}</td>
                </tr>
            </tbody>
    </table>
    <center>
    <a href="/usuario"><button type="button" class="btn btn-secondary" style="--bs-btn-padding-y: 10px; --bs-btn-padding-x: 15px; --bs-btn-font-size: 15px;">cancelar</button></a>  
        <button type="sumbit" class="btn btn-danger" style="--bs-btn-padding-y: 10px; --bs-btn-padding-x: 15px; --bs-btn-font-size: 15px;">Eliminar</button>   
    </center>
    </form>
    <br>
</div>
@endsection