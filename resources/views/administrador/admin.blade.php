@extends('plantilla_admin')
@section('content')
<main class="main-content">
            <h1 class="heading-1">Bienvenido a la bandeja de administracion</h1>
            <p class="heading-1">¿Que haremos el dia de hoy?</p>
            <div class="container">
                <div class="row1">
                    <div class="service">
                        <i class="fa-solid fa-users"></i>
                        <h2>Revisar usuarios</h2>
                    </div>
                    <div class="service">
                        <i class="fa-solid fa-list"></i>
                        <h2>Revisar categorias</h2>
                    </div>
                </div>

                <div class="content_box">
                    <div class="content">
                        <h1 class="heading-1">Usuarios</h1>
                        <table class="table table-dark table-striped table-bordered">
                            <thead>
                                <tr style="text-align:center">
                                    <th>ID</th>
                                    <td>Nombre</td>
                                    <td>Email</td>
                                    <td>Numero de cedula</td>
                                    <td>Direccion</td>
                                    <td>Numero de telefono</td>
                                    <td>Municipio</td>
                                    <td>Eliminar</td>
                                </tr>
                            </thead>
                            @foreach($usuariosCont as $usuariosVist)
                            <tbody>
                                <th scope="row" style="margin: auto;">{{$usuariosVist->id}}</th>
                                <td>{{$usuariosVist->name}}</td>
                                <td>{{$usuariosVist->email}}</td>
                                <td>{{$usuariosVist->num_cedula}}</td>
                                <td>{{$usuariosVist->direccion}}</td>
                                <td>{{$usuariosVist->numero_telefono}}</td>
                                <td>{{$usuariosVist->municipio}}</td>
                                <td style="text-align:center">
                                    <form action="/registro/{{$usuariosVist->id}}" method="post">
                                        @csrf
                                        @method('get')
                                        <button class="btn btn-danger" ><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tbody>
                            @endforeach
                        </table>
                    </div>

                    
                    <div class="content">
                        <center><h1 class="heading-1">Categorias</h1></center>
                        <table class="table table-dark table-striped table-bordered">
                            <thead>
                                <tr style="text-align:center">
                                    <th>ID</th>
                                    <td>Nombre</td>
                                    <td>Descripcion</td>
                                    <td>Imagen</td>
                                    <td>Editar</td>
                                    <td>Eliminar</td>
                                </tr>
                            </thead>
                            @foreach($categoriasCont as $categoriasVist)
                            <tbody>
                                <th scope="row" style="margin: auto;">{{$categoriasVist->id}}</th>
                                <td>{{$categoriasVist->nombre}}</td>
                                <td>{{$categoriasVist->descripcion}}</td>
                                <td>{{$categoriasVist->imagen}}</td>
                                <td style="text-align:center">
                                    <a href="/administrador/{{$categoriasVist->id}}/edit"><button type="button" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                </td>
                                <td style="text-align:center">
                                    <form action="/administrador/{{$categoriasVist->id}}" method="post">
                                        @csrf
                                        @method('get')
                                        <button class="btn btn-danger" ><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tbody>
                            @endforeach
                        </table>
                    </div>

                    
                </div>
                <center>
                    <div class="btn-usuario">
                        <a href="administrador/create"><button>Crear nueva categoria</button></a>
                    </div>
                    <div class="btn-usuario">
                        <a href="usuario"><button>Regresar</button></a>
                    </div>
                </center>
            </div>
        </main>
@endsection