@extends('plantilla')
@section ('content')
@auth
    <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                    <img src="" alt="img-avatar">
                </div>
            </div>
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h3 class="titulo" id="title">{{Auth::user()->name}}<br/>{{Auth::user()->email}}</h3>
            </div>
            <div class="perfil-usuario-data">
                <ul class="lista-datos">
                    <li id="cedula"><i class="fa-solid fa-id-card-clip"></i>{{Auth::user()->num_cedula}}</></i></li>
                    <li id="location"><i class="icono fas fa-map-marker-alt">{{Auth::user()->municipio}}</></i></li>
                    <li id="number" ><i class="icono fas fa-phone-alt">{{Auth::user()->numero_telefono}}</i> </li>
                    <li id="address"><i class="icono fas fa-building">{{Auth::user()->direccion}}</i></li>
                </ul>
            </div>
        </div>

        <div class="row2">
            <div class="service">
                <i class="fa-solid fa-shop"></i>
                <h2>Productos subidos</h2>
            </div>
            <div class="service">
                <i class="fa-solid fa-truck-fast"></i>
                <h2>Ventas</h2>
            </div>
            <div class="service">
                <i class="fa-solid fa-gears"></i>
                <h2>Tu cuenta</h2>
            </div>
            
        </div>

        <div class="content_box">
            <div class="content">
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
                            <td>Categoria</td>
                            <td>Medida</td>
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
                            <td>{{$productosVistU->categoria}}</td>
                            <td>{{$productosVistU->medida}}</td>
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
                 
            </div>

            <div class="content">
                
            
            </div>

            <div class="content">
                <center><h1 class="heading-1">Actualizar datos mis datos</h1></center>
                <div class="contenedor-formP"> 
                    <form action="/registro" method="POST">
                        @csrf
                        <div class="mb-3 mt-2">
                            <label>Nombre de usuario</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" value="{{Auth::user()->name}}" name="nameAC">
                        </div>
                        <div class="mb-3">
                            <label>Municipio (recuerda actualizar siempre municipio)</label>
                            <select class="form-select" type="text" aria-label="Default select example" name="muniAc">
                                <option selected>Municipio</option>
                                <option value="Madrid">Madrid</option>
                                <option value="Mosquera">Mosquera</option>
                                <option value="Funza">Funza</option>
                                <option value="Facatativa">Facatativa</option>
                                <option value="Zipacon">Zipacon</option>
                                <option value="Bojaca">Bojaca</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Numero de telefono</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" value="{{Auth::user()->num_telefono}}" name="numTAc">
                        </div>
                        <div class="mb-3 mt-2">
                            <label>Direccion</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" value="{{Auth::user()->direccion}}" name="direAc">
                        </div>
                        <center>
                            <a href="/usuario"><button type="button" class="btn btn-secondary">cancelar</button></a>
                            <button type="sumbit" class="btn btn-primary">Actualizar</button>
                        </center>
                    </form>
                </div>
            </div>

            
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
    @endauth
@endsection