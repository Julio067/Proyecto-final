@extends('plantilla')
@section ('content')
<div class="container mt-5">
    <h1 class="heading-1">Carrito</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(!$cart || count($cart) == 0)
            <p>No hay productos en el carrito</p>
        @else
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <td>Imagen</td>
                        <td>Nombre</td>
                        <td>Descripción</td>
                        <td>Precio</td>
                        <td>Cantidad disponible</td>
                        <td>Cantidad</td>
                        <td>Eliminar</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $detalles)
                        <tr>
                            <td><img src="image_creada/{{$detalles['imagen']}}" width='50' height='50' alt="foto"></td>
                            <td>{{ $detalles['nombre'] }}</td>
                            <td>{{ $detalles['descripcion'] }}</td>
                            <td>${{ $detalles['precio'] }}</td>
                            <td>{{ $detalles['cantidad'] }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <form action="{{ route('carrito.incrementar', $id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button class="btn btn-success btn-sm mr-2"> + </button>
                                    </form>
                                    <p class="cantidad m-0">{{ $detalles['cantidad'] }}</p>
                                    <form action="{{ route('carrito.disminuir', $id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button class="btn btn-warning btn-sm ml-2"> - </button>
                                    </form>
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('carrito.remove', $id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <td class="table-dark">Total: ${{ $total }}</td>
                </tbody>
            </table>
            <center>
                <form action="{{ route('carrito.comprar') }}" method="POST" class="m-3">
                    @csrf
                    <button class="btn btn-success">Comprar</button>
                </form>
                <form action="{{ route('carrito.limpiar') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger mb-5">Vaciar Carrito</button>
                </form>
            </center>
        @endif
    </div>
@endsection
