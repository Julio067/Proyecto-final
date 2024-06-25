@extends('plantilla')
@section('content')
@auth
    <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                    <img src="image_perfil/{{ Auth::user()->foto_perfil }}" alt="avatar">
                </div>
            </div>
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h3 class="titulo" id="title">{{ Auth::user()->name }}<br>{{ Auth::user()->email }}</h3>
            </div>
            <div class="perfil-usuario-data">
                <ul class="lista-datos">
                    <li class="titulo"><i class="icono fa-solid fa-id-card-clip"></i>{{ Auth::user()->num_cedula }}</li>
                    <li class="titulo"><i class="icono fas fa-map-marker-alt"></i>{{ Auth::user()->municipio }}</li>
                    <li class="titulo"><i class="icono fas fa-phone-alt"></i>{{ Auth::user()->numero_telefono }}</li>
                    <li class="titulo"><i class="icono fas fa-building"></i>{{ Auth::user()->direccion }}</li>
                </ul>
            </div>
        </div>
    </section>
    
    <div class="container">
        <div class="row2">
            <div class="service">
                <i class="fa-solid fa-shop"></i>
                <h2>Productos subidos</h2>
            </div>
            <div class="service">
                <i class="fa-solid fa-gears"></i>
                <h2>Tu cuenta</h2>
            </div>
            <div class="service">
                <i class="fa-solid fa-shop"></i>
                <h2>Mis ventas</h2>
            </div>
        </div>

        <div class="content_box">
            <div class="content">
                <div class="container">
                    <h1 class="heading-1">Tus productos</h1>
                    <table class="table table-dark table-striped table-bordered">
                        <thead>
                            <tr style="text-align:center">
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
                                <td>{{ $productosVistU->nombre }}</td>
                                <td>{{ $productosVistU->descripcion }}</td>
                                <td>{{ $productosVistU->precio }}</td>
                                <td>{{ $productosVistU->cantidad }}</td>
                                <td>{{ $productosVistU->categorias_id}}</td>
                                <td>{{ $productosVistU->medida }}</td>
                                <td style="text-align:center">
                                    <a href="/usuario/{{ $productosVistU->id }}/edit"><button type="button" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                </td>
                                <td style="text-align:center">
                                    <form action="/usuario/{{ $productosVistU->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody> 
                    </table>
                </div>
            </div>

            <div class="content">
                <h1 class="heading-1">Actualizar mis datos</h1>
                <div class="contenedor-formP"> 
                    <form action="/registro/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3 mt-2">
                            <label>Nombre de usuario</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="nameAc" required>
                        </div>
                        <div class="mb-3">
                            <label>Municipio</label>
                            <select class="form-select" name="muniAc" required>
                                <option value="{{ Auth::user()->municipio }}">{{ Auth::user()->municipio }}</option>
                                <option value="Madrid">Madrid</option>
                                <option value="Mosquera">Mosquera</option>
                                <option value="Funza">Funza</option>
                                <option value="Facatativa">Facatativa</option>
                                <option value="Zipacon">Zipacon</option>
                                <option value="Bojaca">Bojaca</option>
                                <option value="Rosal">Rosal</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Numero de telefono</label>
                            <input type="number" class="form-control" value="{{ Auth::user()->numero_telefono }}" name="numTAc">
                        </div>
                        <div class="mb-3 mt-2">
                            <label>Direccion</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->direccion }}" name="direAc">
                        </div>
                        <div class="mb-3">
                            <label class="">Imagen</label>
                            <input type="file" class="form-control" id="exampleInputPassword1" name="fotoAc">
                        </div>
                        <center>
                            <a href="/usuario"><button type="button" class="btn btn-secondary" style="--bs-btn-padding-y: 10px; --bs-btn-padding-x: 15px; --bs-btn-font-size: 15px;">Cancelar</button></a>
                            <button type="submit" class="btn btn-success" style="--bs-btn-padding-y: 10px; --bs-btn-padding-x: 15px; --bs-btn-font-size: 15px;">Actualizar</button>
                        </center>
                    </form>
                </div>
            </div>
            
            <div class="content">
                <div class="container">
                    <h1 class="heading-1">Ventas</h1>
                    <table class="table table-dark table-striped table-bordered">
                        <thead>
                            <tr style="text-align:center">
                                <td>Fecha de compra</td>
                                <td>Cliente</td>
                                <td>Cantidad</td>
                                <td>Total</td>
                                <td>Factura</td>
                                <td>Eliminar</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productosContU as $productosVistU)
                            <tr>
                                <td>{{ $productosVistU->nombre }}</td>
                                <td>{{ $productosVistU->descripcion }}</td>
                                <td>{{ $productosVistU->precio }}</td>
                                <td>{{ $productosVistU->cantidad }}</td>
                                <td style="text-align:center">
                                    <a href="/usuario/{{ $productosVistU->id }}/edit"><button type="button" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                </td>
                                <td style="text-align:center">
                                    <form action="/usuario/{{ $productosVistU->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>


        <center>
            <div class="container-btns">
                <div class="btn-usuario">
                    <a href="usuario/create"><button>Subir un producto</button></a>
                </div>
                @role('admin')
                <div class="btn-usuario">
                    <a href="/administrador"><button type="submit">Gestionar sitio web</button></a>
                </div>
                @endrole
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <div class="btn-usuario">
                        <button type="submit">Cerrar sesión</button>
                    </div>
                </form>
            </div>
        </center>
    </div>
@endauth
@endsection
