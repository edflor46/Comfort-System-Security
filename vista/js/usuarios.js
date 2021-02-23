/* -------------------------------------------------------------------------- */
/*                               Cargar foto de perfil                        */
/* -------------------------------------------------------------------------- */

/**Funcion agregar foto */
let agregarFoto = function () {

    let imagen = this.files[0]

    /**Validar que los formatos sean correctos */
    if (imagen['type'] != 'image/jpeg' && imagen['type'] != 'image/png') {

        $('#foto__usuario').val('')
        Swal.fire({
            icon: "error",
            title: "Error al cargar la imagen",
            text: "La imagen debe estar en formato JPG o PNG",
            confirmButtonText: "cerrar"
        });

        /**Validar que la imagen no pese mas de 2MB */
    } else if (imagen['size'] > 2000000) {

        $('#foto__usuario').val("");
        Swal.fire({
            icon: "error",
            title: "Error al cargar la imagen",
            text: "La imagen no debe pesar mas de 2MB",
            confirmButtonText: "cerrar"
        });

        /**Si la imagen es correcta crear ruta */
    } else {

        /**Visualizar imagen*/
        let datos__imagen = new FileReader()
        datos__imagen.readAsDataURL(imagen)

        $(datos__imagen).on('load', function (event) {
            let ruta__imagen = event.target.result

            $('.loaded__img').attr('src', ruta__imagen)
        })

    }

}

/**evento change. se dispara cuando hay algun cambio en el input FILE */
$('.foto__usuario').change(agregarFoto)

/* -------------------------------------------------------------------------- */
/*                          Validar usuario repetido                          */
/* -------------------------------------------------------------------------- */

let validar__usuario = function (){
    let usuario = $(this).val()
    
    $('.alert').remove()

    let datos = new FormData()
    datos.append('usuario', usuario)

    $.ajax({
        url: 'ajax/usuarios.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response){
            console.log(response)

            if (response) {
                $('#nuevo__nombre-usuario').parent().after(`<div class="animated alert alert-warning mt-2">El usuario <strong>${response['nombre_usuario']}</strong> ya existe, intenta otro</div>`)

                $('#nuevo__nombre-usuario').val('')
            }
        }
    })

}

$('#nuevo__nombre-usuario').change(validar__usuario)

/* -------------------------------------------------------------------------- */
/*                             Actualizar Usuario                             */
/* -------------------------------------------------------------------------- */
let actualizar__usuario = function () {
    let id__usuario = $(this).attr('id__usuario')

    let datos = new FormData();
    datos.append('id__usuario', id__usuario)

    $.ajax({
        url: 'ajax/usuarios.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (response) {
            console.log(response);

            $('#editar__nombre').val(response['nombre'])
            $('#editar__nombre-usuario').val(response['nombre_usuario'])
            $('#editar__email').val(response['email'])
            $('#password__actual').val(response['password'])
            $('#editar__rol').val(response['rol'])
            $('#editar__rol').html(response['rol'])
            $('#foto__establecida').val(response['foto_perfil'])
            $('#id__editar_usuario').val(response['id'])

            if (response['foto_perfil'] != '') {
                $('.loaded__img').attr('src', response['foto_perfil'])
            }
        }
    })
}

$('.editarUsuario').click(actualizar__usuario)


/* -------------------------------------------------------------------------- */
/*                              Eliminar usuario                              */
/* -------------------------------------------------------------------------- */
let eliminar__usuario = function () {
    let id__usuario = $(this).attr('id__usuario')
    let foto__perfil = $(this).attr('foto__perfil')
    let usuario = $(this).attr('usuario')

    console.log(id__usuario, foto__perfil, usuario);

    Swal.fire({
        title: '¡ADVERTENCIA!',
        html: `¿Estas seguro de borrar el usuario: <strong>${usuario}</strong>? <br>Esta opcion no puede revertirse`,
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

            window.location = 'index.php?url=usuarios&id__usuario=' + id__usuario + '&usuario=' + usuario + '&foto__perfil=' + foto__perfil;

        }
    })
}

$('.eliminarUsuario').click(eliminar__usuario)