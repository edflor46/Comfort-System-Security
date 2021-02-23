<?php

class ControladorTrabajos
{

    /* -------------------------------------------------------------------------- */
    /*                                Crear Trabajo                               */
    /* -------------------------------------------------------------------------- */

    static public function CrearTrabajo()
    {
        if (isset($_POST['nuevo__nombre-trabajo'])) {

            $nombre_trabajo = $_POST['nuevo__nombre-trabajo'];
            $cliente_trabajo =  $_POST['select__cliente_trabajo'];
            $categoria_trabajo = $_POST['select__categoria_trabajo'];
            $descripcion_trabajo = $_POST['descripcion_trabajo'];
            $fecha_inicio = $_POST['fecha__inicio_trabajo'];
            $fecha_final = $_POST['fecha__final_trabajo'];
            $total = $_POST['trabajo__total'];


            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $nombre_trabajo) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $descripcion_trabajo)
            ) {




                /**Traer los datos del cliente */
                $column = 'id';
                $value = $cliente_trabajo;

                $getCliente = ModeloClientes::getClientes($column, $value);


                /**Sumar trabajos al cliente */
                $sum_trabajo = $getCliente['trabajos'] + 1;

                $trabajo_cliente = ModeloClientes::actualizarCliente($sum_trabajo, $value);



                /**Guardar trabajo */

                $datos = array(
                    'categoria_id' => $categoria_trabajo,
                    'cliente_id' => $cliente_trabajo,
                    'nombre_trabajo' => $nombre_trabajo,
                    'descripcion_trabajo' => $descripcion_trabajo,
                    'fecha_inicio' => $fecha_inicio,
                    'fecha_final' => $fecha_final,
                    'total' => $total
                );



                $response = ModeloTrabajos::crearTrabajo($datos);


                if ($response == 'success') {
                    echo '<script>
                   Swal.fire(
                    "¡Trabajo creado!",
                    "Presiona ok para continuar",
                    "success"
                  ).then((result)=>{
                      if(result.value){
                          window.location = "trabajos"
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
                        window.location = "trabajos"
                    }
                })
               </script>';
            }
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                    Obtener todos los trabajos Inner join                   */
    /* -------------------------------------------------------------------------- */

    static public function getTrabajos()
    {
        $response = ModeloTrabajos::getTrabajos();
        return $response;
    }

    /* -------------------------------------------------------------------------- */
    /*                         Obtener trabajos realizados                        */
    /* -------------------------------------------------------------------------- */

    static public function getSumTrabajos()
    {
        $response = ModeloTrabajos::getSumTrabajos();
        return $response;
    }
}
