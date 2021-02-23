<?php
require_once 'conexion.php';

class ModeloClientes
{

    /* -------------------------------------------------------------------------- */
    /*                                 getClientes                                */
    /* -------------------------------------------------------------------------- */
    static public function getClientes($column, $value)
    {

        if ($column == NULL) {
            try {
                $cliente = Conexion::conectar()->prepare("SELECT * FROM clientes");
                $cliente->execute();
                return $cliente->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        } else {
            try {
                $cliente = Conexion::conectar()->prepare("SELECT * FROM clientes WHERE $column = :$column");
                $cliente->bindParam(':' . $column, $value, PDO::PARAM_STR);
                $cliente->execute();

                return $cliente->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                                Crear Cliente                               */
    /* -------------------------------------------------------------------------- */

    static public function crearCliente($datos)
    {

        try {
            $crear__cliente = Conexion::conectar()->prepare("INSERT INTO clientes(nombre_cliente, apellido_cliente, telefono, email, fecha_registro)VALUES(:nombre_cliente, :apellido_cliente, :telefono, :email, CURRENT_TIMESTAMP())");

            $crear__cliente->bindParam(':nombre_cliente', $datos['nombre_cliente'], PDO::PARAM_STR);
            $crear__cliente->bindParam(':apellido_cliente', $datos['apellido_cliente'], PDO::PARAM_STR);
            $crear__cliente->bindParam(':telefono', $datos['telefono'], PDO::PARAM_STR);
            $crear__cliente->bindParam(':email', $datos['email'], PDO::PARAM_STR);

            if ($crear__cliente->execute()) {
                return 'success';
            } else {
                return $crear__cliente->errorInfo();
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                               Editar Cliente                               */
    /* -------------------------------------------------------------------------- */

    static public function editarCliente($datos)
    {

        try {
            $editar__cliente = Conexion::conectar()->prepare("UPDATE clientes SET nombre_cliente = :nombre_cliente,   apellido_cliente = :apellido_cliente, telefono = :telefono, email = :email WHERE id = :id");

            $editar__cliente->bindParam(':nombre_cliente', $datos['nombre_cliente'], PDO::PARAM_STR);
            $editar__cliente->bindParam(':apellido_cliente', $datos['apellido_cliente'], PDO::PARAM_STR);
            $editar__cliente->bindParam(':telefono', $datos['telefono'], PDO::PARAM_STR);
            $editar__cliente->bindParam(':email', $datos['email'], PDO::PARAM_STR);
            $editar__cliente->bindParam(':id', $datos['id'], PDO::PARAM_STR);

            if ($editar__cliente->execute()) {
                return 'success';
            } else {
                return $editar__cliente->errorInfo();
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                  Obtener el total de clientes registrados                  */
    /* -------------------------------------------------------------------------- */

    public static function getSumClientes()
    {

        try {
            $sum = Conexion::conectar()->prepare("SELECT COUNT(*) FROM clientes");
            $sum->execute();

            return $sum->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                              Eliminar cliente                              */
    /* -------------------------------------------------------------------------- */

    static public function eliminarCliente($id)
    {
        try {
            $eliminar__cliente = Conexion::conectar()->prepare("DELETE FROM clientes WHERE id = :id");
            $eliminar__cliente->bindParam(':id', $id, PDO::PARAM_INT);

            if ($eliminar__cliente->execute()) {
                return 'success';
            } else {
                return 'failed';
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                             Actualizar Cliente                             */
    /* -------------------------------------------------------------------------- */

    static public function actualizarCliente($sum_trabajo, $value)
    {

        try {
            $update = Conexion::conectar()->prepare("UPDATE clientes SET trabajos = :trabajos, ultimo_trabajo =  CURRENT_TIMESTAMP() WHERE id = :id");

            $update->bindParam(':trabajos', $sum_trabajo, PDO::PARAM_INT);
            $update->bindParam(':id', $value, PDO::PARAM_INT);

            if ($update->execute()) {
                return 'success';
            } else {
                return 'failed';
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
