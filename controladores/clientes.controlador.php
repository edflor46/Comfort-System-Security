<?php

class ControladorClientes
{

    /* -------------------------------------------------------------------------- */
    /*                              Obtener Clientes                              */
    /* -------------------------------------------------------------------------- */

    static public function getClientes($column, $value)
    {

        $response = ModeloClientes::getClientes($column, $value);
        return $response;
    }

    /* -------------------------------------------------------------------------- */
    /*                          Obtener clientes totales                          */
    /* -------------------------------------------------------------------------- */

    static public function getNumClientes(){
        $response = ModeloClientes::getSumClientes();
        return $response;
    }

    

    /* -------------------------------------------------------------------------- */
    /*                                Crear Cliente                               */
    /* -------------------------------------------------------------------------- */

    static public function crearCliente()
    {
        if (
            isset($_POST['nombre__cliente']) &&
            isset($_POST['apellido__cliente']) &&
            isset($_POST['telefono__cliente']) &&
            isset($_POST['email__cliente'])
        ) {



            /**Reasignacion de variables y expresiones regulares */
            $nombre_cliente =  $_POST['nombre__cliente'];
            $apellido_cliente = $_POST['apellido__cliente'];
            $telefono =  $_POST['telefono__cliente'];
            $email = $_POST['email__cliente'];



            /**Verificar que se  cumplan las expresiones */
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $nombre_cliente) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $apellido_cliente) &&
                preg_match('/^[()\-0-9 ]+$/', $telefono) &&
                preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $email)
            ) {

                /**Pasar los datos a un array */
                $datos = array(
                    'nombre_cliente' => $nombre_cliente,
                    'apellido_cliente' => $apellido_cliente,
                    'telefono' => $telefono,
                    'email' => $email
                );

                /**Enviar datos al modelo */
                $response = ModeloClientes::crearCliente($datos);
                var_dump($response);

                if ($response == 'success') {

                    echo '<script>
                    Swal.fire(
                     "¡Cliente creado!",
                     "Presiona ok para continuar",
                     "success"
                   ).then((result)=>{
                       if(result.value){
                           window.location = "clientes"
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
                            window.location = "clientes"
                        }
                    })
                   </script>';
            }
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                               Editar Cliente                               */
    /* -------------------------------------------------------------------------- */

    static public function editarCliente()
    {
        if (isset($_POST['id__cliente'])) {


            /**Reasignacion de variables y expresiones regulares */
            $id = $_POST['id__cliente'];
            $nombre_cliente =  $_POST['editar__nombre-cliente'];
            $apellido_cliente = $_POST['editar__apellido-cliente'];
            $telefono =  $_POST['editar__telefono-cliente'];
            $email = $_POST['editar__email-cliente'];

            /**Verificar que se  cumplan las expresiones */
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $nombre_cliente) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $apellido_cliente) &&
                preg_match('/^[()\-0-9 ]+$/', $telefono) &&
                preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $email)
            ) {

                /**Pasar los datos a un array */
                $datos = array(
                    'id' => $id,
                    'nombre_cliente' => $nombre_cliente,
                    'apellido_cliente' => $apellido_cliente,
                    'telefono' => $telefono,
                    'email' => $email,

                );

                /**Enviar datos al modelo */
                $response = ModeloClientes::editarCliente($datos);
                var_dump($response);


                if ($response == 'success') {

                    echo '<script>
                    Swal.fire(
                     "¡Cliente Actualizado!",
                     "Presiona ok para continuar",
                     "success"
                   ).then((result)=>{
                       if(result.value){
                           window.location = "clientes"
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
                            window.location = "clientes"
                        }
                    })
                   </script>';
            }
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                              Eliminiar Cliente                             */
    /* -------------------------------------------------------------------------- */

    static public function eliminarCliente()
    {
        if (isset($_GET['id_cliente'])) {

            $id = $_GET['id_cliente'];

            $response = ModeloClientes::eliminarCliente($id);

            if ($response == 'success') {

                echo '<script>
                Swal.fire(
                 "¡Cliente Eliminado!",
                 "Presiona ok para continuar",
                 "success"
               ).then((result)=>{
                   if(result.value){
                       window.location = "clientes"
                   }
               })
                </script>';
            }
        }
    }
}
