<?php

class ModeloTrabajos
{

    /* -------------------------------------------------------------------------- */
    /*                                Crear Trabajo                               */
    /* -------------------------------------------------------------------------- */

    public static function crearTrabajo($datos)
    {

        try {
            $crear_trabajo = Conexion::conectar()->prepare("INSERT INTO trabajos (categoria_id, cliente_id, nombre_trabajo, descripcion_trabajo, fecha_inicio, fecha_final, total)VALUES(:categoria_id, :cliente_id, :nombre_trabajo, :descripcion_trabajo, :fecha_inicio, :fecha_final, :total)");


            $crear_trabajo->bindParam(':categoria_id', $datos['categoria_id'], PDO::PARAM_INT);
            $crear_trabajo->bindParam(':cliente_id', $datos['cliente_id'], PDO::PARAM_INT);
            $crear_trabajo->bindParam(':nombre_trabajo', $datos['nombre_trabajo'], PDO::PARAM_STR);
            $crear_trabajo->bindParam(':descripcion_trabajo', $datos['descripcion_trabajo'], PDO::PARAM_STR);
            $crear_trabajo->bindParam(':fecha_inicio', $datos['fecha_inicio'], PDO::PARAM_STR);
            $crear_trabajo->bindParam(':fecha_final', $datos['fecha_final'], PDO::PARAM_STR);
            $crear_trabajo->bindParam(':total', $datos['total'], PDO::PARAM_STR);



            if ($crear_trabajo->execute()) {
                return 'success';
            } else {
                return $crear_trabajo->errorInfo();
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                         Obtener trabajos INNER JOIN                        */
    /* -------------------------------------------------------------------------- */

    public static function getTrabajos()
    {

        try {
            $getTrabajos = Conexion::conectar()->prepare("SELECT * from trabajos INNER JOIN clientes on clientes.id = trabajos.cliente_id INNER JOIN categorias ON categorias.id = trabajos.categoria_id");

            $getTrabajos->execute();

            return $getTrabajos->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                     Obtener suma todal de los trabajos                     */
    /* -------------------------------------------------------------------------- */

    public static function getSumTrabajos()
    {

        try {
            $sum = Conexion::conectar()->prepare("SELECT SUM(trabajos) FROM clientes");
            $sum->execute();

            return $sum->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
