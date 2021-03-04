function obligatorio(clase) {
    var i = 0;
    $('.' + clase).each(function (key, val) {
        if ($(this).val() == "" || $(this).val() == null) {
            $(this).addClass('obligado');
            console.log( $(this).attr('name'))
            i++;
        } else {
            $(this).removeClass('obligado');
        }
    });
    if (i == 0)
        return true;
    else {
        //alert('Campos Sin llenar')
        alertas("Campos sin llenar", 'warning')
    }
}
$('.dropdown').on('click', function (e) {
    $('.dropdown-menu').dropdown('toggle');
});
$('.dropdown-menu input, .dropdown-menu label').click(function (e) { e.stopPropagation(); });

function alertas(titulo, icono, text = null, html = null, accion = null) {
    switch (icono) {
        case "warning":
        case "success":
        case "error":
        case "danger":
            datos = {
                icon: icono,
                title: titulo
            }

            if (text != null) {
                datos['text'] = text;
            }
            if (html != null) {
                datos['html'] = html
            }
            Swal.fire(datos)

            break;
        case "confirm":
            Swal.fire({
                title: titulo,
                text: text,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                denyButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed == true) {
                    if (accion != null) {
                        forward_static_call(accion, null)
                    } else {
                        confirmar();
                    }
                }
            })

            break;
    }
    function forward_static_call(cb, parameters) {
        var func;
        if (typeof cb == 'string') {
            if (typeof this[cb] == 'function') {
                func = this[cb];
            } else {
                func = (new Function(null, 'return ' + cb))();
            }
        }
        else if (Object.prototype.toString.call(cb) === '[object Array]') {
            func = eval(cb[0] + "['" + cb[1] + "']");
        }

        if (typeof func != 'function') {
            throw new Error(func + ' is not a valid function');
        }

        return func.apply(null, Array.prototype.slice.call(arguments, 1));
    }
}
