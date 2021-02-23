<?php

class ControladrorCategorias
{

    /* -------------------------------------------------------------------------- */
    /*                               Crear Categoria                              */
    /* -------------------------------------------------------------------------- */

    static public function crearCategoria()
    {
        if (isset($_POST['nueva__categoria'])) {

            $categoria = $_POST['nueva__categoria'];
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $categoria)) {

                $reponse = ModeloCategorias::crearCategoria($categoria);

                if ($reponse == 'success') {
                    echo '<script>
                    Swal.fire(
                        "¡Categoria Creada!",
                        "Presiona ok para continuar",
                        "success"
                      ).then((result)=>{
                          if(result.value){
                              window.location = "categorias"
                          }
                      })
                    </script>';
                }
            } else {
                echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Algo salio mal...",
                    text: "Verifica que no haya campos vacios",
                  }).then((result)=>{
                    if(result.value){
                        window.location = "categorias"
                    }
                })
               </script>';
            }
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                                getCategorias                               */
    /* -------------------------------------------------------------------------- */

    static public function getCategorias($column, $value)
    {


        $reponse = ModeloCategorias::getCategorias($column, $value);
        return $reponse;
    }

    /* -------------------------------------------------------------------------- */
    /*                              Editar Categorias                             */
    /* -------------------------------------------------------------------------- */

    static public function editarCategoria()
    {

        if (isset($_POST['idCategoria'])) {
            $id = $_POST['idCategoria'];
            $nombre_categoria = $_POST['editar__categoria'];

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $nombre_categoria)) {

                $datos = array(
                    'nombre_categoria' => $nombre_categoria,
                    'id' => $id
                );


                $reponse = ModeloCategorias::editarCategoria($datos);

                if ($reponse == 'success') {
                    echo '<script>
                    Swal.fire(
                        "¡Categoria Actualizada!",
                        "Presiona ok para continuar",
                        "success"
                      ).then((result)=>{
                          if(result.value){
                              window.location = "categorias"
                          }
                      })
                    </script>';
                }
            } else {
                echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Algo salio mal...",
                    text: "Verifica que no haya campos vacios",
                  }).then((result)=>{
                    if(result.value){
                        window.location = "categorias"
                    }
                })
               </script>';
            }
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                             Eliminar Categoria                             */
    /* -------------------------------------------------------------------------- */

    static public function eliminarCategoria()
    {

        if (isset($_GET['id_categoria'])) {
            $id = $_GET['id_categoria'];

            $response = ModeloCategorias::eliminarCategoria($id);
            var_dump($response);
            if ($response == 'success') {

                echo '<script>
                    Swal.fire(
                        "¡Categoria Eliminada!",
                        "Presiona ok para continuar",
                        "success"
                      ).then((result)=>{
                          if(result.value){
                              window.location = "categorias"
                          }
                      })
                 </script>';
            } else {
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Algo salio mal...",
                        text: "Error en el servidor o la categoria no existe",
                      }).then((result)=>{
                        if(result.value){
                            window.location = "categorias"
                        }
                    })
                   </script>';
            }
        }
    }
}
