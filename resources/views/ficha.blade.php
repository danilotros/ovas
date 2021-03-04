@extends('template')
@section('title','Ficha')
@section('content')
<div class="mt-2 container ">
    <div class=" mb-3 ">
        <form>
            <h1>Ficha técnica OVA</h1>
            <span class="d-block p-2 bg-danger text-white "><h5>General</h5></span>
            <br>
            <dl class="row">
                <dt class="col-sm-3">Titulo:</dt>
                <dd class="col-sm-9">{{!empty($ova)?$ova->titulo:''}}</dd>

                <dt class="col-sm-3">Descripción:</dt>
                <dd class="col-sm-9">
                    <p>
                        {{!empty($ova)?$ova->descripcion:''}}
                    </p>
                </dd>

                <dt class="col-sm-3">Idioma(s):</dt>
                <dd class="col-sm-9">{{!empty($ova)?$ova->idioma:''}}</dd>

                <dt class="col-sm-3 text-truncate">Palabras clave:</dt>
                <dd class="col-sm-9">{{!empty($ova)?$ova->palabras_Clave:''}}</dd>
            </dl>

            <span class="d-block p-2 bg-danger text-white"><h5>Ciclo de vida</h5></span>
            <br>
            <dl class="row">
                <dt class="col-sm-3">Autor(es):</dt>
                <dd class="col-sm-9">{{!empty($ova)?$ova->autor:''}}</dd>

                <dt class="col-sm-3">Entidad:</dt>
                <dd class="col-sm-9">{{!empty($ova)?$ova->entidad:''}}</dd>

                <dt class="col-sm-3 text-truncate">Versión:</dt>
                <dd class="col-sm-9">{{!empty($ova)?$ova->version:''}}</dd>

                <dt class="col-sm-3">Fecha de publicación:</dt>
                <dd class="col-sm-9">{{!empty($ova)?date('d/m/Y', strtotime($ova->created_at)):''}}</dd>
            </dl>

            <span class="d-block p-2 bg-danger text-white"><h5>Información técnica</h5></span>
            <br>
            <dl class="row">
                <dt class="col-sm-3">Formato:</dt>
                <dd class="col-sm-9">{{!empty($ova)?$ova->formato:''}}</dd>

                <dt class="col-sm-3">Instrucciones de instalación:</dt>
                <dd class="col-sm-9">
                    <p>{{!empty($ova)?$ova->instrucciones:''}}</p>
                </dd>

                <dt class="col-sm-3">Requerimientos:</dt>
                <dd class="col-sm-9">{{!empty($ova)?$ova->requerimientos:''}}</dd>

            </dl>

            <span class="d-block p-2 bg-danger text-white"><h5>Derechos</h5></span>
            <br>
            <dl class="row">
                <dt class="col-sm-3">Costo:</dt>
                <dd class="col-sm-9">{{!empty($ova)?$ova->costo:''}}</dd>

                <dt class="col-sm-3">Derechos de autor y restricciones:</dt>
                <dd class="col-sm-9">{{!empty($ova)?$ova->derechos:''}}</dd>
            </dl>

            <span class="d-block p-2 bg-danger text-white"><h5>Anotación</h5></span>
            <br>
            <dl class="row">
                <dt class="col-sm-3">Uso:</dt>
                <dd class="col-sm-9">{{!empty($ova)?$ova->uso:''}}</dd>
            </dl>

            <span class="d-block p-2 bg-danger text-white"><h5>Clasificación</h5></span>
            <br>
            <dl class="row">
                <dt class="col-sm-3">Fuente de clasificación:</dt>
                <dd class="col-sm-9">A description list is perfect for defining terms.</dd>

                <dt class="col-sm-3">Ruta taxonómica:</dt>
                <dd class="col-sm-9">This definition is short, so no extra paragraphs or anything.</dd>
            </dl>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="button " class="btn btn-danger btn-lg btn-block btnRegresar">Regresar</button>
            </div>
        </form>

    </div>
</div>
@endsection
@section('javascript')

<script>
    /**
     * funcion para regrasar a la pagina anterior
    */
    $('.btnRegresar').click(function(){
       history.go(-1)
    })
</script>
@endsection
