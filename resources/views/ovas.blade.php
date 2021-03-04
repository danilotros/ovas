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
        .divCentrado{
            margin:0 2rem 2rem 5rem;
            justify-content: center;
        }


    </style>
    <h1> BANCO DE OBJETOS VIRTUALES</h1>

    @foreach ($ovas as $item)
        <div class="card mb-5 cardOvas" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4 divImg">
                    <img src="{{asset('img/virtuslogo.png')}}" class="card-img">
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
                            <div class="col-sm"> <a href="/ficha-ova/{{$item->id}}" class="btn btn-primary"><b>ver ficha</b></a></div>
                            <div class="col-sm"> <a href="{{asset('./').$item->archivo}}" target="_blank"class="btn btn-danger"><b>descargar</b></a></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @if (count($ovas)==0)
        <h3> No se encontraron datos</h3>
    @endif
@endsection
