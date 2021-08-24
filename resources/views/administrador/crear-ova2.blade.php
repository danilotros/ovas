@extends('template')
@section('content')
<div class="mt-2 container ">
    <div class=" mb-3 ">
        <form id="frm_ova">
            @csrf
            <div class="form-row">
                <div class="form-group col-lg-6">
                    <label for="inputl">Titulo</label>
                    <input type="text" class="form-control obligatorio" id="inputl" placeholder="Titulo del Ova" name="titulo" required>
                </div>
                <div class="form-group col-lg-6">
                    <label for="input2">Autor</label>
                    <input type="text" class="form-control obligatorio" id="input2" placeholder="Autor del Ova" name="autor" required>
                </div>
            </div>
            <div class="form-group">
                <label for="input3">Descripción</label>
                <textarea class="form-control mt-2 obligatorio" id="input3" placeholder="Descripción del Ova" name="descripcion"required></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-lg-6">
                    <label for="input4">Idioma</label>
                    <select class="form-control obligatorio selecionadores" id="validationCustom03" name="idioma" required>
                        <option selected disabled value="">Selecione</option>
                        @foreach ($idiomas as $item)
                            <option value="{{ $item->idioma }}">{{ $item->idioma }}</option>
                        @endforeach
                    </select>
                </div>


            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="input5">Uso</label>
                    <select class="form-control obligatorio selecionadores" id="input 5" name="uso" required>
                        <option selected disabled value="">Selecione</option>
                        <option>Academico</option>
                        <option>Comercial</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="input8">Entidad</label>
                    <select class="form-control obligatorio selecionadores" id="input8" name="entidad" required>
                        <option selected disabled value="">Selecione</option>
                        @foreach ($entidades as $item)
                            <option value="{{ $item->entidad }}">{{ $item->entidad }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">

            </div>
            <div class="form-row">

                <div class="form-group col-sm-6">
                    <label for="input6">Area</label>
                    <select class="form-control obligatorio selecionadores" id="input6" name="area"  required>
                        <option selected disabled value="">Selecione</option>
                        @foreach ($areas as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre_area }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="input7">Núcleo</label>
                    <select class="form-control obligatorio selecionadores" id="input7" name="nucleo" required>
                        <option selected disabled value="">Selecione</option>
                        @foreach ($nucleos as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre_nucleo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="input9">Palabras clave</label>
                <textarea class="form-control obligatorio" id="input9" placeholder="Palabras clave del Ova" name="palabras"required></textarea>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="input10" class="form-label">Versión</label>
                    <input type="text" class="form-control obligatorio" id="input10" placeholder="Versión del ova" name="version" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="3"required>
                </div>
                <div class="form-group col-md-6">
                    <label for="input11" class="form-label">Formato</label>
                    <input type="text" class="form-control obligatorio" id="input11" placeholder="Formato de extensión del ova" name="formato" required>
                </div>
            </div>

            <div class="form-group">
                <label for="input12">Requerimientos</label>
                <textarea class="form-control obligatorio" id="input12" placeholder="Requerimientos de instalación del Ova" name="requerimientos" required></textarea>

            </div>

            <div class="form-group">
                <label for="input13">Instrucciones de intalación</label>
                <textarea class="form-control obligatorio" id="input13" placeholder="Instrucciones de instalación del Ova" name="instrucciones"required></textarea>

            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="input14" class="form-label">Costo</label>
                    <input type="text" class="form-control" id="input14" placeholder="Costo en pesos COP$" name="costo"maxlength="15"onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="input15" class="form-label">Derechos</label>
                        <input type="text" class="form-control obligatorio " id=" input15 " placeholder=" Derechos del ova " name="derechos"required>
                    </div>

                </div>

                <div class=" form-group ">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input obligatorio" name="archivo" id=" input17 "  >
                      <label class="custom-file-label "  for=" input17 ">Choose file OVA</label>
                    </div>
                </div>

                <div class=" form-group col-md-4 ">
                    <label for=" input16 " class=" form-label mt-3">Usuario que publica</label>
                    <input type=" text " class=" form-control obligatorio  autores " id=" input15 " placeholder="USUARIO QUE PUBLICA" name="usuarioPublica"required>
                </div>
                <div class=" form-group ">
                    <button type="button" class="btn btn-primary btn-lg btn-block guardarOva">Agregar OVA</button>
                </div>
            </form>

        </div>
    </div>
    <style>
        .selecionadores{
            width: 26rem;
        }
        .autores{
            width: 70rem;
            margin-left: -1rem;
        }
    </style>

@endsection

@section('javascript')
    <script>
        /**
         * funcion para guardar las ovas por medio de ajax
         *
        */
        $('.guardarOva').click(function() {
            if (obligatorio('obligatorio')) {
                var dataForm = new FormData(document.getElementById('frm_ova'));
                $.ajax({
                    type: 'POST',
                    url: '/crear-ovas',
                    dataType: "json",
                    data: dataForm,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(empresa) {
                        if (empresa['code'] == 200) {
                            alertas( empresa.message, "success")
                            window.location.href = empresa.url;

                            alertas()
                        } else if (empresa['code'] == 500) {
                            alertas( empresa.message, "error")
                        }
                    }
                });
            }
        })

    </script>
@endsection
