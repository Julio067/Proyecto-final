@extends('plantilla')
@section('content')
<div class="container mt-5">
    <h1 class="heading-1">Carrito</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if($cart->isEmpty())
        <center><p>No hay productos en el carrito</p></center>
    @else
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad disponible</th>
                    <th>Acciones</th>
                    <th>Comprar</th>
                    <th>Eliminar</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td><img src="image_creada/{{$item->producto->imagen}}" width='50' height='50' alt="foto"></td>
                        <td>{{ $item->producto->nombre }}</td>
                        <td>{{ $item->producto->precio }}</td>
                        <td>{{ $item->producto->cantidad }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <form action="{{ route('carrito.incrementar', $item->producto_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm mr-2">+</button>
                                </form>

                                <form action="{{ route('carrito.actualizar', $item->producto_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="number" name="cantidad" class="form-control cantidad-input" value="{{ $item->cantidad }}"/>
                                </form>

                                <form action="{{ route('carrito.disminuir', $item->producto_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm ml-2">-</button>
                                </form>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('pasarela', $item->producto_id) }}"><button class="btn btn-success mb-2">Comprar</button></a>
                        </td>
                        <td>
                            <form action="{{ route('carrito.remove', $item->producto_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mb-2">Eliminar</button>
                            </form>
                        </td>
                        <td class="table-dark">Total: ${{ $item->producto->precio * $item->cantidad }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <center>
            <form action="{{ route('carrito.limpiar') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mb-5">Vaciar Carrito</button>
            </form>
        </center>
    @endif
</div>
@endsection