@extends('template')
@section('content')

     <style>
    /* Make the image fully responsive */
    .carousel-inner img {
        width: 100%;
        height: 600px;
    }
    .carousel-inner img:hover
     {
        opacity: 0.5;
    }

    #main-carousel {
        width: 100%;
        padding: 0 0 0 0;
        margin: 2rem 0 2rem 0;
    }

    .carousel-caption {
        color:black;
        text-align: justify;
    }



    .carousel-caption h1 {
        text-align: center;
    }
    </style>
    <main>
        <div class="container">
            <div class="carousel slide" id="main-carousel" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#main-carousel" data-slide-to="1"></li>
                </ol><!-- /.carousel-indicators -->

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid " src="{{asset('img/ova.png')}}" alt="">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>OBJETO VIRTUAL DE APRENDIZAJE</h1>


                            <p>Es un conjunto de recursos digitales, autocontenible y reutilizable, con un propósito
                                educativo.
                                http://www.colombiaaprende.edu.co/html/directivos/1598/article-172369.html.
                            </p>


                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{asset('img/banco.png')}}" alt="">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>BANCO DE OBJETOS VIRTUALES DE APRENDIZAJE</h1>
                            <p>Un Banco de Objetos de Aprendizaje es una colección de recursos digitales para la
                                enseñanza y el aprendizaje.</p>

                        </div>
                    </div>
                </div><!-- /.carousel-inner -->

                <a href="#main-carousel" class="carousel-control-prev" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="sr-only" aria-hidden="true">Prev</span>
                </a>
                <a href="#main-carousel" class="carousel-control-next" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="sr-only" aria-hidden="true">Next</span>
                </a>
            </div><!-- /.carousel -->
        </div><!-- /.container -->


@endsection
@section('javascript')
    <script>

    </script>
@endsection
