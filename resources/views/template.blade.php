<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

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
            <div class="">
                <a class="navbar-brand" href="/home">
                    <img src="{{ asset('img/virtuslogo.png') }}" class="img-fluid" width="70" height="70" alt="">
                </a>
            </div>
            <a style="margin-left:15rem; text-decoration:none; color:inherit;" href="/home">HOME</a>
            <a style="margin-left:15rem; text-decoration:none; color:inherit;" href="/ovas">BANCO</a>
            <ul class="nav-item dropdown" style="margin-left:8rem; margin-top:1rem;">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img src="{{ asset('img/user.png') }}"
                        class="special-img img-circle">{{ auth()->user()->name }}<b class="caret"></b></a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li></li><a href="/crear-ovas">OVA</a></li>
                    <li><a href="/logout"><i class="fa fa-sign-out"></i> SALIR</a></li>
                </ul>
            </ul>
            <div class="d-none d-md-block">
                <a class="navbar-brand " href="/home">
                    <img src="{{ asset('img/udlogo.png') }}" class="img-fluid" width="70" height="70" alt="">
                </a>
            </div>
            <div class="d-none d-md-block">
                <a class="navbar-brand " href="/home">
                    <img src="{{ asset('img/tecnologicalogo.png') }}" class="img-fluid" width="70" height="70" alt="">
                </a>
            </div>
        </nav>
    @else
        <nav class="navbar navbar-expand-sm navbar-light"
            style="background-image: linear-gradient(45deg,#e84a5f, #2a363b)">


            <div class="">
                <a class="navbar-brand" href="/home">
                    <img src="{{ asset('img/virtuslogo.png') }}" class="img-fluid" width="70" height="70" alt="">
                </a>
            </div>



            <button
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#nabVar1"
            class="navbar-toggler"
            aria-controls="nabvarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse" id="nabVar1">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/home" class="nav-link active mx-5">HOME</a>
                    </li>
                    <li class="nav-item active">
                        <a href="/ovas" class="nav-link mx-5">BANCO</a>
                    </li>
                </ul>
            </div>



            <div class="d-none d-md-block">
                <a class="navbar-brand " href="/home">
                    <img src="{{ asset('img/udlogo.png') }}" class="img-fluid" width="70" height="70" alt="">
                </a>
            </div>
            <div class="d-none d-md-block">
                <a class="navbar-brand " href="/home">
                    <img src="{{ asset('img/tecnologicalogo.png') }}" class="img-fluid" width="70" height="70" alt="">
                </a>
            </div>

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
                    <h6 class=" font-weight-bold">© Grupo Interinstitucional Virtus 2021</h6>



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
        border-block-width: 2rem;
        border-block-color: white;
    }

    .dropdown-menu {
        text-align: center;
        padding: 0;
    }

</style>

</html>
