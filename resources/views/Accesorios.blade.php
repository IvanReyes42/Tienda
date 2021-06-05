@extends('welcome')
@section('content')
<div class="container-fluid liston pb-2 pt-2">
    <h1>
        Accesorios
    </h1>
</div>
<div class="container mb-5">
    <div class="row">
        @foreach($Articulos as $Articulo)
            <div class="col-12 col-lg-3 col-md-6 col-sm-6 mt-4 pb-3">
                <div class="card" >
                    <a href="#" data-toggle="modal" data-target="#EditarModal{{$Articulo->id}}"><img src="{{URL::asset($Articulo->UrlImagen)}}" class="card-img-top" alt="..." style="height: 200px"></a>
                    <div class="card-body" style="background: #C6E4DA; color: #296B55">
                        <p class="card-text" style="text-align: center"><h3>{{$Articulo->Nombre}}</h3><br>
                        @if($Articulo->Ofertas != null)
                            <h5>Oferta de</h5>
                            <h5 style="text-decoration:line-through;"> ${{$Articulo->Precio}} </h5>
                            <h5 style="color: red">A tan solo ${{$Articulo->Ofertas}} Pesos</h5><br>
                        @endif
                        @if($Articulo->Ofertas == null)
                            <h5>${{$Articulo->Precio}} Pesos</h5> <br>
                        @endif
                        {{$Articulo->Descripcion}} <br>
                        Tallas: {{$Articulo->Tallas}}
                        </p>
                    </div>
                </div>
            </div>

            <div class="modal fade  " id="EditarModal{{$Articulo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$Articulo->Nombre}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <img src="{{URL::asset($Articulo->UrlImagen)}}" alt="" class="ImgModal">
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>
@endsection
