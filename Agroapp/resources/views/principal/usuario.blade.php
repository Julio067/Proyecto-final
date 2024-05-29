@extends('plantilla')
@section ('content')

    <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                    <img src="/image/fresas.jpg" alt="img-avatar">
                    <button type="button" class="boton-avatar">
                        <i class="far fa-image"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                @auth
                <h3 class="titulo" id="title">{{Auth::user()->name}}<br/>{{Auth::user()->email}}</h3>
                @endauth
            </div>
            <div class="perfil-usuario-data">
                <ul class="lista-datos">
                    <li  id="location"><i class="icono fas fa-map-marker-alt"><p></p></i></li>
                    <li id="number" ><i class="icono fas fa-phone-alt"></i></li>
                    <li id="address"><i class="icono fas fa-building"></i></li>
                </ul>
            </div>
        </div>

        <div class="container">    
            <h1 class="heading-1">Tus productos</h1>
            <table class="table table-dark table-striped table-bordered">
                <thead>
                    <tr style="text-align:center">
                        <th>ID</th>
                        <td>Nombre</td>
                        <td>Descripcion</td>
                        <td>Precio</td>
                        <td>Cantidad</td>
                        <td>Editar</td>
                        <td>Eliminar</td>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($productosContU as $productosVistU)
                    <tr>
                        <th scope="row" style="margin: auto;">{{$productosVistU->id}}</th>
                        <td>{{$productosVistU->nombre}}</td>
                        <td>{{$productosVistU->descripcion}}</td>
                        <td>{{$productosVistU->precio}}</td>
                        <td>{{$productosVistU->cantidad}}</td>
                        <td style="text-align:center">
                            <a href="/usuario/{{$productosVistU->id}}/edit"><button type="button" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></button></a>
                        </td>
                        <td style="text-align:center">
                            <form action="/usuario/{{$productosVistU->id}}" method="post">
                                @csrf
                                @method('get')
                                <button class="btn btn-danger" ><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody> 
            </table>

        </div>
            <div class="btn-usuario">
                <a href="usuario/create">Subir un producto</a>
            </div>
            <form action="{{ route('logout')}}" method="POST">
            @csrf
                <div class="btn-usuario">
                    <button type="sumbit" >Cerrar sesion</button>
                </div>
            </form>
            
        </div>
    </section>

@endsection