@extends('template')
@section('content')
    <div class="container h-100 align-items-center">
        <div class="card mb-3 " style=" max-width: 1000px;">
            <form class="row g-3 needs-validation align-items-center" id="frm_ova" novalidate>
                @csrf
                <div class="col-md-8">
                    <label for="validationCustom01" class="form-label" placeholder="Enter Card Number">Titulo del
                        OVA</label>
                    <input type="text" class="form-control obligatorio " size="50" id="validationCustom01" value=""
                        name="titulo" required>
                    <label for="validationCustom02" class="form-label">Descripción</label>
                    <input type="text" class="form-control obligatorio" id="validationCustom02" value="" name="descripcion"
                        required>

                    <label for="validationCustom03" class="form-label mt-3">Idioma</label>
                    <select class="form-select obligatorio" id="validationCustom03" name="idioma" required>
                        <option selected disabled value="">Selecione</option>
                        @foreach ($idiomas as $item)
                            <option value="{{ $item->idioma }}">{{ $item->idioma }}</option>
                        @endforeach

                    </select>
                    <label for="validationCustom14" class="form-label">Uso</label>
                    <select class="form-select obligatorio" id="validationCustom14" name="uso" required>
                        <option selected disabled value="">Elegir</option>
                        <option>Academico</option>
                        <option>Comercial</option>
                    </select>
                    <label for="validationCustom15" class="form-label">Área</label>
                    <select class="form-select obligatorio" id="validationCustom15" name="area" required>
                        <option selected disabled value="">Selecione</option>
                        @foreach ($areas as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre_area }}</option>
                        @endforeach
                    </select>
                    <label for="validationCustom16" class="form-label">Núcleo</label>
                    <select class="form-select obligatorio" id="validationCustom16" name="nucleo" required>
                        <option selected disabled value="">Selecione</option>
                        @foreach ($nucleos as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre_nucleo }}</option>
                        @endforeach
                    </select>
                    <label for="validationCustom14" class="form-label">Entidad</label>
                    <select class="form-select obligatorio" id="validationCustom14" name="entidad" required>
                        <option selected disabled value="">Selecione</option>
                        @foreach ($entidades as $item)
                            <option value="{{ $item->entidad }}">{{ $item->entidad }}</option>
                        @endforeach
                    </select>
                    <br>

                    <label for="validationCustom04" class="form-label">Palabras clave</label>
                    <input type="text" class="form-control obligatorio" id="validationCustom04" name="palabras" required>
                    <label for="validationCustom05" class="form-label">Autor</label>
                    <input type="text" class="form-control obligatorio" id="validationCustom05" name="autor" required>
                    <label for="validationCustom07" class="form-label">Versión</label>
                    <input type="text" class="form-control obligatorio" id="validationCustom07" name="version" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    <label for="validationCustom09" class="form-label">Formato</label>
                    <input type="text" class="form-control obligatorio" id="validationCustom09" name="formato" required>
                    <label for="validationCustom11" class="form-label">Requerimientos</label>
                    <input type="text" class="form-control obligatorio" id="validationCustom11" name="requerimientos"
                        required>
                    <label for="validationCustom10" class="form-label">Instrucciones de instalación</label>
                    <input type="text" class="form-control obligatorio" id="validationCustom10" name="instrucciones"
                        required>
                    <label for="validationCustom12" class="form-label">Costo (pesos)</label>
                    <input type="text" class="form-control obligatorio" id="validationCustom12" name="costo" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    <label for="validationCustom13" class="form-label">Derechos</label>
                    <input type="text" class="form-control obligatorio" id="validationCustom13" name="derechos" required>

                    <label for="validationCustom18" class="form-label">Archivo</label>
                    <input type="file" class="form-control obligatorio" id="validationCustom18" name="archivo" required>
                    <label for="validationCustom17" class="form-label mt-3">Usuario que publica</label>
                    <input type="text" class="form-control obligatorio" id="validationCustom13" name="usuarioPublica"
                        required>
                </div>


                <div class="col-12">
                    <button class="btn btn-primary guardarOva" type="button">Agregar OVA</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
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
