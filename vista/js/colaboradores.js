/* -------------------------------------------------------------------------- */
/*                             editar colaborador                             */
/* -------------------------------------------------------------------------- */

let editar = function () {
    let id__col = $(this).attr('id__col')


    let datos = new FormData()
    datos.append('id__col', id__col)

    $.ajax({
        url: 'ajax/colaboradores.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (response) {
            // console.log(response);

            $('#editar__nombre-col').val(response['nombre'])
            $('#editar__telefono-col').val(response['contacto'])
            $('#editar__rol-col').val(response['rol_trabajo'])
            $('#id__colaborador').val(response['id'])
        }
    })
}

$('.editarColaborador').click(editar)

/* -------------------------------------------------------------------------- */
/*                                  Eliminar                                  */
/* -------------------------------------------------------------------------- */

let eliminar = function () {
    let id__col = $(this).attr('id__col')
    let nombre__col = $(this).attr('nombre__col')


    Swal.fire({
        title: '¡ADVERTENCIA!',
        html: `¿Estas seguro de borrar el cliente: <strong>${nombre__col}</strong>? <br>Esta opcion no puede revertirse`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#C70039',
        cancelButtonColor: '#ECEC09',
        confirmButtonText: 'Si, eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            //   Swal.fire(
            //     `¡${usuario} ha sido borrado!`,
            //     'Presiona ok para regresar al panel de control',
            //     'success'
            //   )

            window.location = 'index.php?url=colaboradores&id_col=' + id__col + '&nombre_col=' + nombre__col;

        }
    })
}


$('.eliminarColaborador').click(eliminar)


/* -------------------------------------------------------------------------- */
/*                                   Estado                                   */
/* -------------------------------------------------------------------------- */

let estadoChange = function () {

    let id__col = $(this).attr('id__col')
    let estado__col = $(this).attr('estado__col')

    let datos = new FormData()
    datos.append('id__col', id__col)
    datos.append('estado__col', estado__col)

    $.ajax({
        url: 'ajax/colaboradores.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (response) {

            console.log(response);
            if (response) {

                if (window.matchMedia("(max-width:767px)").matches) {

                    swal({
                        title: "El usuario ha sido actualizado",
                        type: "success",
                        confirmButtonText: "¡Cerrar!"
                    }).then(function (result) {
    
                        if (result.value) {
    
                            window.location = "usuarios";
    
                        }
    
                    });
    
    
                }
            }
        }
    })

    if (estado__col == 0) {
        $(this).removeClass('btn-success')
        $(this).addClass('btn-danger')
        $(this).html('En trabajo')
        $(this).attr('estado__col', 1)
    } else {

        $(this).removeClass('btn-danger')
        $(this).addClass('btn-success')
        $(this).html('Libre')
        $(this).attr('estado__col', 0)

    }



}

$('.btnEstado').click(estadoChange)