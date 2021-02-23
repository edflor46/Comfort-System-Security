<?php
require_once 'conexion.php';
class ModeloCategorias
{

    /* -------------------------------------------------------------------------- */
    /*                              Crear Categorias                              */
    /* -------------------------------------------------------------------------- */
    static public function crearCategoria($categoria)
    {
        try {
            $crear_categoria = Conexion::conectar()->prepare("INSERT INTO categorias (nombre_categoria) VALUES (:nombre_categoria)");

            $crear_categoria->bindParam(':nombre_categoria', $categoria, PDO::PARAM_STR);
            if ($crear_categoria->execute()) {
                return 'success';
            } else {
                return 'failed';
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                               get Categorias                               */
    /* -------------------------------------------------------------------------- */

    static public function getCategorias($column, $value)
    {

        if ($column == null) {

            try {

                $categorias = Conexion::conectar()->prepare("SELECT * FROM categorias");
                $categorias->execute();
                return $categorias->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        } else {

            try {

                $categorias = Conexion::conectar()->prepare("SELECT * FROM categorias WHERE $column = :$column");
                $categorias->bindParam(':' . $column, $value, PDO::PARAM_STR);
                $categorias->execute();


                return $categorias->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                              Editar Categorias                             */
    /* -------------------------------------------------------------------------- */

    static public function editarCategoria($datos)
    {
        try {
            $editar = Conexion::conectar()->prepare("UPDATE categorias SET nombre_categoria = :nombre_categoria WHERE id = :id");
            $editar->bindParam(':id', $datos['id'], PDO::PARAM_INT);
            $editar->bindParam(':nombre_categoria', $datos['nombre_categoria'], PDO::PARAM_STR);

            if ($editar->execute()) {
                return 'success';
            } else {
                return 'failed';
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                             Eliminar Categorias                            */
    /* -------------------------------------------------------------------------- */

    public static function eliminarCategoria($id)
    {

        try {
            $eliminar = Conexion::conectar()->prepare("DELETE FROM categorias WHERE id = :id");
            $eliminar->bindParam(':id', $id, PDO::PARAM_INT);

            if ($eliminar->execute()) {
                return 'success';
            } else {
                return $eliminar->errorInfo();
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
