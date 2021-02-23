/* -------------------------------------------------------------------------- */
/*                              Editar Categoria                              */
/* -------------------------------------------------------------------------- */

let editar__categoria = function () {
    let id__categoria = $(this).attr('id__categoria')

    let datos = new FormData()
    datos.append('id__categoria', id__categoria)

    $.ajax({
        url: 'ajax/categorias.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (response) {
            console.log(response);

            $('#idCategoria').val(response['id'])
            $('#editar__categoria').val(response['nombre_categoria'])

        }
    })

}

$('.editarCategoria').click(editar__categoria)

/* -------------------------------------------------------------------------- */
/*                             Eliminar Categoria                             */
/* -------------------------------------------------------------------------- */

let eliminar__categoria = function () {
    let id = $(this).attr('id__categoria')
    let nombre = $(this).attr('nombre__categoria')

    Swal.fire({
        title: '¡ADVERTENCIA!',
        html: `¿Estas seguro de borrar la categoria: <strong>${nombre}</strong>? <br>Esta opcion no puede revertirse`,
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

            window.location = 'index.php?url=categorias&id_categoria=' + id + '&categoria=' + nombre 

        }
    })
}


$('.eliminarCategoria').click(eliminar__categoria)