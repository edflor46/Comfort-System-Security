<?php
require_once 'conexion.php';
class ModeloUsuarios
{

    /* -------------------------------------------------------------------------- */
    /*                               Ultima Conexion                              */
    /* -------------------------------------------------------------------------- */

    static public function ultimaConexion($id_usuario)
    {
        try {
            $ultimaConexion = Conexion::conectar()->prepare("UPDATE usuarios SET ultimo_login = CURRENT_TIMESTAMP() WHERE id = :id");

            $ultimaConexion->bindParam(':id', $id_usuario, PDO::PARAM_STR);
            if ($ultimaConexion->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    /* -------------------------------------------------------------------------- */
    /*                                   Get Users                                */
    /* -------------------------------------------------------------------------- */

    static public function getUsers($column, $value)
    {
        if ($column == null) {
            try {
                $response = Conexion::conectar()->prepare("SELECT * FROM usuarios");
                $response->execute();

                return $response->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        } else {

            try {

                $response = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE $column = :$column");
                $response->bindParam(':' . $column, $value, PDO::PARAM_STR);
                $response->execute();


                return $response->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }


        $response = null;
    }



    /* -------------------------------------------------------------------------- */
    /*                                Crear Usuario                               */
    /* -------------------------------------------------------------------------- */

    static public function crearUsuario($data)
    {
        try {
            $crearUsuario = Conexion::conectar()->prepare("INSERT INTO usuarios(nombre, nombre_usuario, email, password, rol, foto_perfil, ultimo_login, fecha_registro) VALUES(:nombre, :nombre_usuario, :email, :password, :rol, :foto_perfil, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP())");

            $crearUsuario->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
            $crearUsuario->bindParam(':nombre_usuario', $data['nombre_usuario'], PDO::PARAM_STR);
            $crearUsuario->bindParam(':email', $data['email'], PDO::PARAM_STR);
            $crearUsuario->bindParam(':password', $data['password'], PDO::PARAM_STR);
            $crearUsuario->bindParam(':rol', $data['rol'], PDO::PARAM_STR);
            $crearUsuario->bindParam(':foto_perfil', $data['foto_perfil'], PDO::PARAM_STR);

            if ($crearUsuario->execute()) {
                return 'success';
            } else {
                return 'failed ';
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    /* -------------------------------------------------------------------------- */
    /*                               Editar Usuario                               */
    /* -------------------------------------------------------------------------- */

    static public function editarUsuario($data)
    {
        try {
            $editar = Conexion::conectar()->prepare("UPDATE usuarios SET nombre = :nombre, nombre_usuario = :nombre_usuario, email = :email, password = :password, rol = :rol, foto_perfil = :foto_perfil WHERE id = :id");

            $editar->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
            $editar->bindParam(':nombre_usuario', $data['nombre_usuario'], PDO::PARAM_STR);
            $editar->bindParam(':email', $data['email'], PDO::PARAM_STR);
            $editar->bindParam(':password', $data['password'], PDO::PARAM_STR);
            $editar->bindParam(':rol', $data['rol'], PDO::PARAM_STR);
            $editar->bindParam(':foto_perfil', $data['foto_perfil'], PDO::PARAM_STR);
            $editar->bindParam(':id', $data['id'], PDO::PARAM_STR);


            if ($editar->execute()) {
                return 'success';
            } else {
                return $editar->errorInfo();
            }
            $editar = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                              Eliminar usuario                              */
    /* -------------------------------------------------------------------------- */

    static public function eliminarUsuario($id)
    {
        try {
            $eliminar = Conexion::conectar()->prepare("DELETE FROM usuarios WHERE id = :id");
            $eliminar->bindParam(':id', $id, PDO::PARAM_STR);

            if ($eliminar->execute()) {
                return 'success';
            } else {
                return 'failed';
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                              Usuarios totales                              */
    /* -------------------------------------------------------------------------- */

    public static function getTotalUsuarios()
    {

        try {
            $sum = Conexion::conectar()->prepare("SELECT COUNT(*) FROM usuarios");
            $sum->execute();

            return $sum->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
