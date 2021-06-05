@extends('layouts.app')

@section('content')

    <!--Inicio Tabla-->
    <div class="container">
        @if(\Session::has('destroy'))
            <div class="alert alert-danger" role="alert">
               <p>{{\Session::get('destroy')}}</p>
            </div>
        @endif

            @if(\Session::has('editar'))
                <div class="alert alert-success" role="alert">
                    <p>{{\Session::get('editar')}}</p>
                </div>
            @endif
            @if(\Session::has('guardar'))
                <div class="alert alert-info" role="alert">
                    <p>{{\Session::get('guardar')}}</p>
                </div>
            @endif

        <div class="row">
            <!-- Button trigger modal -->
            <div class="col-10 text-center">
                <form action="{{route('home')}}" method="get">
                    <div class="row">
                        <div class="col-5">
                            <input type="text" class="form-control" id="Busqueda" name="Busqueda" value="{{$Categoria}}" placeholder="Busqueda por categoria">

                        </div>
                        <div class="col-5">
                            <input type="text" class="form-control" id="BNombre" name="BNombre" value="{{$Nombre}}" placeholder="Busqueda por nombre">

                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-info">Buscar </button>
                        </div>
                    </div>
                </form>


            </div>
            <div class="col-2 text-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="background:#296B55;color: white ">
                    Nuevo Producto
                </button>
            </div>
            <!-- End Button trigger modal -->
            <div class="col-12 mt-2 container-fluid" >
                <table class="table table-hover" >
                    <thead style="background-color: #296B55; color:white">
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Tallas</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Ofertas</th>
                        <th scope="col">Categoria</th>

                        <th scope="col">Estatus</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Articulos as $Articulo)
                    <tr>
                        <th>{{$Articulo->id}}</th>
                        <td>{{$Articulo->Nombre}}</td>
                        <td>{{$Articulo->Descripcion}}</td>
                        <td>{{$Articulo->Tallas}}</td>
                        <td>${{$Articulo->Precio}}</td>
                        <td>
                            @if($Articulo->Ofertas != null)
                                ${{$Articulo->Ofertas}}
                            @endif
                        </td>
                        <td>{{$Articulo->Categoria}}</td>

                        <td>{{$Articulo->Estatus}}</td>
                        <td>
                            <div class="row">
                                <div class="col-6">
                                    <a class="Lapiz" data-toggle="modal" data-target="#EditarModal{{$Articulo->id}}" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                        </svg>
                                    </a>

                                </div>
                                <!--Modal Editar-->

                                <div class="modal fade" id="EditarModal{{$Articulo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #296B55; color: white">
                                                <h5 class="modal-title" id="exampleModalLabel">Actualizar Datos Productos</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('Articulos.update',$Articulo->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="Producto">Producto</label>
                                                        <input type="text" class="form-control" id="Producto" name="Producto" value="{{$Articulo->Nombre}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Descripcion">Descripción</label>
                                                        <input type="textarea" class="form-control" id="Descripcion" name="Descripcion" value="{{$Articulo->Descripcion}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Talla">Tallas</label>
                                                        <input type="text" class="form-control" id="Talla" name="Talla" value="{{$Articulo->Tallas}}">
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-12 col-md-6 col-lg-6 col-sm-12">
                                                            <label for="Precio">Precio</label>
                                                            <input type="text" class="form-control" id="Precio" name="Precio" value="{{$Articulo->Precio}}">
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6 col-sm-12">
                                                            <label for="Oferta">Oferta</label>
                                                            <input type="text" class="form-control" id="Oferta" name="Oferta" value="{{$Articulo->Ofertas}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Categoria">Categoria</label>
                                                        <select id="Categoria" class="form-control" name ="Categoria" >
                                                            @if($Articulo->Categoria=="Mujeres")
                                                                <option value="Mujeres" selected="true">Mujeres</option>
                                                                <option value="Hombres">Hombres</option>
                                                                <option value="Niños">Niños</option>
                                                                <option value="Accesorios">Accesorios</option>
                                                            @endif
                                                                @if($Articulo->Categoria=="Hombres")
                                                                    <option value="Mujeres" >Mujeres</option>
                                                                    <option value="Hombres" selected="true">Hombres</option>
                                                                    <option value="Niños">Niños</option>
                                                                    <option value="Accesorios">Accesorios</option>
                                                                @endif
                                                                @if($Articulo->Categoria=="Niños")
                                                                    <option value="Mujeres" >Mujeres</option>
                                                                    <option value="Hombres" >Hombres</option>
                                                                    <option value="Niños" selected="true">Niños</option>
                                                                    <option value="Accesorios">Accesorios</option>
                                                                @endif
                                                                @if($Articulo->Categoria=="Accesorios")
                                                                    <option value="Mujeres" >Mujeres</option>
                                                                    <option value="Hombres" >Hombres</option>
                                                                    <option value="Niños" >Niños</option>
                                                                    <option value="Accesorios" selected="true">Accesorios</option>
                                                                @endif
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Estatus">Estatus</label>
                                                        <select id="Estatus" class="form-control" name ="Estatus">
                                                            @if($Articulo->Estatus =="Activo")
                                                                <option value="Activo" selected="true">Activo</option>
                                                                <option value="En pausa">En pausa</option>
                                                            @endif
                                                                @if($Articulo->Estatus =="En Pausa")
                                                                    <option value="Activo" >Activo</option>
                                                                    <option value="En Pausa" selected="true">En Pausa</option>
                                                                @endif
                                                        </select>
                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background:red;color: white ">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary" style="background:#296B55;color: white ">Actualizar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!--Fin Modal Editar-->


                                <div class="col-6">

                                        <a  class="Basura" data-toggle="modal" data-target="#EliminarModal" data-id="{{$Articulo->id}}" data-producto="{{$Articulo->Nombre}}">

                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>


                                        </a>

                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </table>
            {{$Articulos->links()}}
            </div>
        </div>
    </div>
    <!--Fin Tabla-->


    <!-- Modal Nuevo -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #296B55; color: white">
                    <h5 class="modal-title" id="exampleModalLabel">Datos Productos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('Articulos.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Producto">Producto</label>
                            <input type="text" class="form-control" id="Producto" name="Producto">
                        </div>
                        <div class="form-group">
                            <label for="Descripcion">Descripción</label>
                            <input type="textarea" class="form-control" id="Descripcion" name="Descripcion">
                        </div>
                        <div class="form-group">
                            <label for="Talla">Tallas</label>
                            <input type="text" class="form-control" id="Talla" name="Talla">
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-6 col-lg-6 col-sm-12">
                                <label for="Precio">Precio</label>
                                <input type="text" class="form-control" id="Precio" name="Precio">
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-sm-12">
                                <label for="Oferta">Oferta</label>
                                <input type="text" class="form-control" id="Oferta" name="Oferta">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Categoria">Categoria</label>
                            <select id="Categoria" class="form-control" name ="Categoria">
                                <option value="Mujeres">Mujeres</option>
                                <option value="Hombres">Hombres</option>
                                <option value="Niños">Niños</option>
                                <option value="Accesorios">Accesorios</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Imagen">Subir una imagen</label>
                            <input type="file" name="Imagen" id="Imagen" accept="image/*" class="form-control-file ">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background:red;color: white ">Cancelar</button>
                        <button type="submit" class="btn btn-primary" style="background:#296B55;color: white ">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

  <!--Fin Modal Insertar-->
    <!--Modal Eliminar-->

    <div class="modal fade" id="EliminarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #296B55; color: white">
                    <h6 class="modal-title" id="exampleModalLabel"></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background:#296B55;color: white ">Cancelar</button>
                    <form id="FormEliminar" action="{{url('Articulos/1')}}"  data-action="{{url('Articulos/1')}}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" >Eliminar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--Fin Modal Eliminar-->



    <script>

        $('#EliminarModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var producto = button.data('producto')
            action = $('#FormEliminar').attr('data-action').slice(0,-1);
            action+=id;

            $('#FormEliminar').attr('action',action);

            var modal = $(this)
            modal.find('.modal-title').text('Se eliminara el registro: ' + id)
            modal.find('.modal-body ').text('¿Esta seguro de eliminar el producto '+producto)
        })


    </script>


@endsection
