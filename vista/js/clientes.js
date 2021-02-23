/* -------------------------------------------------------------------------- */
/*                                   Cliente                                  */
/* -------------------------------------------------------------------------- */

let editar__cliente = function () {

    let id__cliente = $(this).attr('id__cliente')

    let datos = new FormData()
    datos.append('id__cliente', id__cliente)

    $.ajax({
        url: 'ajax/clientes.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (response) {
            console.log(response);
            $('#editar__nombre-cliente').val(response['nombre_cliente'])
            $('#editar__apellido-cliente').val(response['apellido_cliente'])
            $('#editar__telefono-cliente').val(response['telefono'])
            $('#editar__email-cliente').val(response['email'])
            $('#id__cliente').val(response['id'])
        }
    })

}

$('.editarCliente').click(editar__cliente)

/* -------------------------------------------------------------------------- */
/*                               Elminar Cliente                              */
/* -------------------------------------------------------------------------- */

let eliminar__cliente =  function(){
    let id__cliente = $(this).attr('id__cliente')
    let nombre__cliente = $(this).attr('nombre__cliente')

    
    Swal.fire({
        title: '¡ADVERTENCIA!',
        html: `¿Estas seguro de borrar el cliente: <strong>${nombre__cliente}</strong>? <br>Esta opcion no puede revertirse`,
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

            window.location = 'index.php?url=clientes&id_cliente=' + id__cliente + '&nombre_cliente=' + nombre__cliente;

        }
    })
}


$('.eliminarCliente').click(eliminar__cliente)