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
                <h3 class="titulo" id="title">Julian David Guzman Ortiz</h3>
            </div>
            <div class="perfil-usuario-data">
                <ul class="lista-datos">
                    <li  id="location"><i class="icono fas fa-map-marker-alt"></i></li>
                    <li id="number" ><i class="icono fas fa-phone-alt"></i></li>
                    <li id="address"><i class="icono fas fa-building"></i></li>
                </ul>
            </div>
        </div>

        <div class="perfil-usuario-data">    
            <center><h1 style="margin: 20px;" >Tabla de vuelos</h1></center>
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
                        <td>Consultar</td>
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        <th scope="row" style="margin: auto;"> </th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align:center">
                            <a href="/vuelos/ /edit"><button type="button" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></button></a>
                        </td>
                        <td style="text-align:center">
                            <form action="/vuelos/ " method="post">
                                @csrf
                                @method('get')
                                <button class="btn btn-danger" ><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                        <td style="text-align:center">
                            <form action="consult.php" method="post">
                                <button type="sumbit" class="btn btn-warning" name=bConsultar><i class="fa-solid fa-upload"></i></button>
                            </form>
                        </td>
                    </tr>
                </tbody> 

                
            </table>

        </div>
            <div class="btn-usuario">
                <a href="home/create">Subir novedad</a> <br> <br>
            </div>
            <div class="btn-usuario">
                <a href="home/create">Cerrar sesión</a>
            </div>
        </div>
    </section>

@endsection
