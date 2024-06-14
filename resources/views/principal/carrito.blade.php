@extends('plantilla')
@section ('content')
@if(session('cart'))
<h1 class="heading-1">Tu carrito</h1>


<div class="container">
    
    <table class="table table-dark table-striped table-bordered">
        <thead>
            <tr style="text-align:center">
                <td>Imagen</td>
                <td>Nombre</td>
                <td>Descripcion</td>
                <td>Precio</td>
                <td>Cantidad</td>
                <td>Categoria</td>
                <td>Medida</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
        </thead>
        
        <tbody>
            
            @foreach(session('cart') as $id=>$detalles)
                            <tr>
                            <td><img src="image_creada/{{$detalles['imagen']}}" width='50' height='50' alt="foto"></td>
                                <td>{{$detalles['descripcion']}}</td>
                                <td>{{$detalles['descripcion']}}</td>
                                <td>{{$detalles['precio']}}</td>
                                <td>{{$detalles['cantidad']}}</td>
                                <td>{{$detalles['categoria']}}</td>
                                <td>{{$detalles['medida']}}</td>
                                <td style="text-align:center">
                                    <form action="/home/{{$id}}" method="post">
                                        @csrf
                                        @method('get')
                                        <button><i class="fa-solid fa-cart-shopping"></i></button>
                                    </form>
                                </td>
                                <td style="text-align:center">
                                    <form action="remove/{{$id}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" ><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                                @endforeach
                            </tr>
                            
                        </tbody> 
                    </table>
                    </div>
                    <h3>TOTAL: ${{$total}}</h3>
@endif
@endsection
