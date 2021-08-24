@extends('template')
@section('title', 'OVAS')
@section('content')
<style>
    h1 {
        margin: 5rem 0rem 3rem 25rem;
    }

    .cardOvas {
        margin: 5rem 0rem 5rem 12rem;
    }

    .divCentrado {
        margin: 0 2rem 2rem 5rem;
        justify-content: center;
    }


</style>
<h1> BANCO DE OBJETOS VIRTUALES</h1>
<form action="/ovas" method="post" id="objetos">
    @csrf
    <div class="row filtrador" >

        <div class="col-sm-2">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary filtrar" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" name="datos" value="{{ isset($post['datos']) ? $post['datos'] : '' }}">
            </div>
        </div>
        <div class="col-sm-3">

            <div class="input-group">
                <span class="input-group-text">
                    <i class="far fa-calendar"></i>
                </span>
                <input data-datepicker="" class="form-control" id="datePicker" type="date" placeholder="dd/mm/yyyy"
                    required>
            </div>
        </div>
        <div class="col-sm-2">

            <select class="form-control filtrarSe" aria-label="Default select example" name="nucleos">
                <option selected value="">NUCLEOS</option>
                @foreach ($nucleo as $item)
                <option value="{{$item->id}}" {{ isset($post['nucleos'])?($post['nucleos']==$item->id?'selected':''):'' }}>{{$item->nombre_nucleo}}</option>
                @endforeach

            </select>
        </div>
        <div class="col-sm-2">

            <select class="form-control filtrarSe" aria-label="Default select example" name="areas">
                <option selected value="">AREAS</option>
                @foreach ($area as $item)
                <option value="{{$item->id}}" {{ isset($post['areas'])?($post['areas']==$item->id?'selected':''):'' }}>{{$item->nombre_area}}</option>
                @endforeach

            </select>
        </div>
        <div class="col-sm-2">

            <select class="form-control filtrarSe" aria-label="Default select example" name="idiomas">
                <option selected value="">IDIOMAS</option>
                @foreach ($idioma as $item)
                <option value="{{$item->idioma}}" {{ isset($post['idiomas'])?($post['idiomas']==$item->idioma?'selected':''):'' }}>{{$item->idioma}}</option>
                @endforeach

            </select>
        </div>
    </div>
</form>








@foreach ($ovas as $item)
    <div class="card mb-5 cardOvas" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4 divImg">
                <img src="{{ asset('img/virtuslogo.png') }}" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="divCentrado">
                        <h5 class="card-title">{{ $item->titulo }}</h5>
                        <p class="card-text"><b>Autor:</b> {{ $item->autor }}</p>
                        <p class="card-text"><b>Año:</b> {{ date('Y', strtotime($item->fecha)) }}</p>
                        <p class="card-text"><b>Entidad:</b> {{ $item->entidad }}</p>
                    </div>
                    <div class="row">
                        <div class="col-sm"> <a href="/ficha-ova/{{ $item->id }}" class="btn btn-primary"><b>ver
                                    ficha</b></a></div>
                        <div class="col-sm"> <a href="{{ asset('./') . $item->archivo }}" target="_blank"
                                class="btn btn-danger"><b>descargar</b></a></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endforeach
@if (count($ovas) == 0)
    <h3 style="margin-top:10rem;margin-bottom:10rem;"> No se encontraron datos</h3>
@endif
@endsection
@section('javascript')
<script>
    $(".filtrarSe").on('change', function() {
        $('#objetos').submit();
    })
    $(".filtrar").click(function(){
        $('#objetos').submit();
    })

</script>
@endsection
