<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/litepicker/2.0.11/litepicker.js"></script>
    <title>@yield('title')</title>
</head>

<body>
    {{-- header --}}
    @php
        $areas = ListaAreas();
    @endphp
    @if (Auth::check())
        <nav class="navbar navbar-expand-lg navbar-light"
            style="background-image: linear-gradient(45deg,#e84a5f, #2a363b)">
            <a class="navbar-brand" href="/home">
                <img src="{{ asset('img/udlogo.png') }}" width="70" height="70" alt="">
            </a>
            <a class="navbar-brand" href="/home">
                <img src="{{ asset('img/tecnologicalogo.png') }}" width="70" height="70" alt="">
            </a>
            {{-- <ul class="navbar-nav" style="margin-left:5rem;">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    AREAS
                </a>


                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach ($areas as $item)
                        <a class="dropdown-item" href="/ovas/{{$item->id}}">{{$item->nombre_area}}</a>
                    @endforeach
                </div>

            </li>
        </ul> --}}
            {{-- <form class="form-inline" action="/ovas" method="POST">
            @csrf
            <input class="form-control" type="search" placeholder="" aria-label="Search" name="datos" style="margin-left:12rem;">
            <button class="btn btn-outline-danger my-2 my-sm-0 ml-2 mr-5" type="submit">Buscar</button>
        </form> --}}


            <a style="margin-left:15rem; text-decoration:none; color:inherit;" href="/home">HOME</a>
            <a style="margin-left:15rem; text-decoration:none; color:inherit;" href="/ovas">BANCO</a>
            <ul class="nav-item dropdown" style="margin-left:8rem; margin-top:1rem;">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img src="{{ asset('img/user.png') }}" class="special-img img-circle">{{ auth()->user()->name }}<b
                        class="caret"></b></a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li></li><a href="/crear-ovas">OVA</a></li>
                    <li><a href="/logout"><i class="fa fa-sign-out"></i> SALIR</a></li>
                </ul>
            </ul>
            <a class="navbar-brand" href="/home" style="margin-left:10rem;">
                <img src="{{ asset('img/virtuslogo.png') }}" width="70" height="70" alt="">
            </a>

        </nav>
    @else
        <nav class="navbar navbar-expand-lg navbar-light"
            style="background-image: linear-gradient(45deg,#e84a5f, #2a363b)">
            <a class="navbar-brand" href="/home">
                <img src="{{ asset('img/udlogo.png') }}" width="70" height="70" alt="">
            </a>
            <a class="navbar-brand" href="/home">
                <img src="{{ asset('img/tecnologicalogo.png') }}" width="70" height="70" alt="">
            </a>
            {{-- <ul class="navbar-nav" style="margin-left:5rem;">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    AREAS
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach ($areas as $item)
                        <a class="dropdown-item" href="/ovas/{{$item->id}}">{{$item->nombre_area}}</a>
                    @endforeach
                </div>


            </li>
        </ul> --}}
            {{-- <form class="form-inline" action="/ovas" method="POST">
            @csrf
            <input class="form-control" type="search" placeholder="" aria-label="Search" name="datos" style="margin-left:12rem;">
            <button class="btn btn-outline-danger my-2 my-sm-0 ml-2 mr-5" type="submit">Buscar</button>
        </form> --}}
            <a style="margin-left:15rem; text-decoration:none; color:inherit;" href="/home">HOME</a>
            <a style="margin-left:15rem; text-decoration:none; color:inherit;" href="/ovas">BANCO</a>

            <a class="navbar-brand" href="/home" style="margin-left:28rem;">
                <img src="{{ asset('img/virtuslogo.png') }}" width="70" height="70" alt="">
            </a>

        </nav>
    @endif

    {{-- endheader --}}
    @yield('content')
    {{-- footer --}}
    <footer class="page-footer font-small teal pt-4" style="background-image: linear-gradient(45deg,#e84a5f, #2a363b)">

        <!-- Footer Text -->
        <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-3 mt-md-0 mt-3 mx-5">

                    <!-- Content -->
                    <h6 class=" font-weight-bold">© Grupo Interinstitucional Virtus 2020 - 2021</h6>



                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3 mx-2">

                    <!-- Content -->
                    <h6 class="text-uppercase font-weight-bold"><a class="texto"
                            href="https://www.udistrital.edu.co/inicio">Ubicación UDFJC</a></h6>


                </div>
                <!-- Grid column -->
                <hr class="clearfix w-100 d-md-none pb-3">
                <!-- Grid column -->
                <div class="col-md-2 mb-md-0 mb-3 mx-2">

                    <!-- Content -->
                    <h6 class="text-uppercase font-weight-bold"><a class="texto"
                            href="https://etitc.edu.co/es/">Ubicación ETICTC</a> </h6>


                </div>
                <hr class="clearfix w-100 d-md-none pb-3">
                <!-- Grid column -->
                <div class="col-md-2 mb-md-0 mb-3 mx-2">

                    <!-- Content -->
                    <h6 class="text-uppercase font-weight-bold"><a class="texto"
                            href="http://www.pedagogiavirtual.com/sitio/">Nuestra SAS</a> </h6>


                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Text -->

    </footer>
    {{-- endfooter --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/funciones.js') }}"></script>
    <script src="{{ asset('js/jquery.blockUI.js') }}"></script>

    @yield('javascript')
</body>
<script>
    $(function() {
        //Se pone para que en todos los llamados ajax se bloquee la pantalla mostrando el mensaje Procesando...
        $.blockUI.defaults.message = '<img src="{{ asset('img/loading.gif') }}" width="100px">';
        $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
    });
</script>
<style>
    .blockUI,
    .blockMsg,
    .blockPage {
        background-color: '' !important;
    }

    .blockUI {
        z-index: 2147483636 !important;
    }

    .texto {
        text-decoration: none !important;
        color: #2a363b;
    }

    .special-img {
        position: relative;
        top: -5px;
        float: left;
        left: -5px;
        width: 30px;
        height: 30px;
    }

    .img-circle {
        border-radius: 10rem;
        border-block-width:2rem;
        border-block-color: white;
    }

    .dropdown-menu {
        text-align: center;
        padding: 0;
    }

</style>

</html>
