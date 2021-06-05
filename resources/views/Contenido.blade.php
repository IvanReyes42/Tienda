@extends('welcome')
@section('content')
    <!--Carusel-->
    <main id="main">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="Imagenes/Carusel/Carusel 4.jpg" class="d-block w-100 Carusel" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="Imagenes/Carusel/Pasalera 2.png" class="d-block w-100 Carusel" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="Imagenes/Carusel/Artesania.jpg" class="d-block w-100 Carusel" alt="...">
                </div>

                <div class="overlay">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6 text-md-right offset-md-6 text-center">
                                <h1>Doñas Clothes</h1>
                                <p class="d-none d-md-block">Conoce nuestra nueva colección <br> Verano 2021
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        </div>
    </main>
    <!--Fin Carusel-->
    <!--Menu Dos-->

    <div class="container mt-5 mb-4">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-3 col-md-6 col-sm-6 mt-2">
                <a href="{{route('Mujeres')}}"><img src="Imagenes/Categorias/Mujeres.png" alt="" class="Categoria"></a>
            </div>
            <div class="col-12 col-lg-3 col-md-6 col-sm-6 mt-2">
                <a href="{{route('Hombre')}}"><img src="Imagenes/Categorias/Hombre.png" alt="" class="Categoria"></a>
            </div>
            <div class="col-12 col-lg-3 col-md-6 col-sm-6 mt-2">
                <a href="{{route('Niños')}}"><img src="Imagenes/Categorias/Niños.png" alt="" class="Categoria"></a>
            </div>
            <div class="col-12 col-lg-3 col-md-6 col-sm-6 mt-2">
                <a href="{{route('Accesorios')}}"><img src="Imagenes/Categorias/Accesorios.png" alt="" class="Categoria"></a>
            </div>

        </div>

    </div>

    <!--End Menu Dos-->
    <div id="Nostros">
        <div class="container-fluid pb-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 pb-2">
                    <h1 class="Sucursales">Conoce Nuestras Sucursales</h1>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 pt-5 offset-lg-1">

                    <h4  onclick="Mostrar('Lagos');">Lagos de Moreno</h4>
                    <p>Horrario Lunes - Sabados de 9 am. a 8 pm. <br>
                        Domingos de 9 am. a 4 pm.
                    </p>

                    <h4 onclick="Mostrar('Leon');">León Guanajuato</h4>
                    <p>Todos los dias de 9 am. a 8 pm. </p>

                    <h4 onclick="Mostrar('SanJuan');">San Juan de los Lagos</h4>
                    <p>Horrario Lunes - Sabados de 9 am. a 8 pm. <br>
                        Domingos de 9 am. a 4 pm.
                    </p>

                    <h4 onclick="Mostrar('Aguas');">Aguascalientes</h4>
                    <p>Todos los dias de 9 am. a 8 pm. </p>

                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-5 google-maps pr-2">
                    <iframe id="Mapa" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d464.50132998594097!2d-101.9350834659558!3d21.35007554180401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1622677801162!5m2!1ses-419!2smx" frameborder="0"></iframe>
                </div>
            </div>

        </div>
    </div>

@endsection
