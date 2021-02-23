<?php


class ControladorUsuarios
{

    /* -------------------------------------------------------------------------- */
    /*                                    Login                                   */
    /* -------------------------------------------------------------------------- */

    static public function login()
    {

        if (isset($_POST['usuario__login']) && isset($_POST['password__login'])) {
            $usuario_login = ($_POST['usuario__login']);
            $password_login = $_POST['password__login'];

            if (preg_match('/^[a-zA-Z0-9]+$/', $usuario_login) && preg_match('/^[a-zA-Z0-9]+$/', $password_login)) {

                /**Envio y Respuesta del modelo */
                $column = 'nombre_usuario';
                $value = $usuario_login;
                $response = ModeloUsuarios::getUsers($column, $value);


                /**Validar si la respuesta viene true o false */
                if ($response) {

                    /**Descrifrar password */
                    $hash = $response['password'];
                    $auth_password = password_verify($password_login, $hash);

                    /**Si da true validar que sean los datos correctos e iniciar la sesion */
                    if ($response['nombre_usuario'] == $usuario_login && $auth_password == $password_login) {
                        $_SESSION['login'] = 'autenticado';
                        $_SESSION['id'] = $response['id'];
                        $_SESSION['nombre'] = $response['nombre'];
                        $_SESSION['usuario'] = $response['nombre_usuario'];
                        $_SESSION['email'] = $response['email'];
                        $_SESSION['rol'] = $response['rol'];
                        $_SESSION['foto_perfil'] = $response['foto_perfil'];


                        /**Actualizar ultimo inicio de sesion */
                        $id_usuario = $_SESSION['id'];
                        $ultima_conexion = ModeloUsuarios::ultimaConexion($id_usuario);

                        /**Si la consulta devuelve TRUE */
                        if ($ultima_conexion) {
                            echo
                            '<script>
                            Swal.fire(
                                "¡Bienvenido!",
                                "' . $_SESSION['nombre'] . '",
                                "success"
                              ).then((result)=>{
                                  if(result.value){
                                      window.location = "inicio"
                                    }
                              })
                                
                            </script>';
                        }

                        /**Si los datos no coinciden */
                    } else {
                        echo '<div class="alert alert-danger">Usuario o contraseña incorrectos</div>';
                    }

                    /**Si la respuesta devuelve false */
                } else {
                    echo '<div class="alert alert-danger">El usuario <strong>"' . $usuario_login . '"</strong> no existe</div>';
                }
            }
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                                   Get users                               */
    /* -------------------------------------------------------------------------- */

    static public function getUsers($column, $value)
    {
        $response = ModeloUsuarios::getUsers($column, $value);
        return $response;
    }

    /* -------------------------------------------------------------------------- */
    /*                                Crear usuario                               */
    /* -------------------------------------------------------------------------- */

    static public function crearUsuario()
    {

        /**Validar que existan los inputs */
        if (
            isset($_POST['nuevo__nombre']) &&
            isset($_POST['nuevo__nombre-usuario']) &&
            isset($_POST['nuevo__email']) &&
            isset($_POST['nuevo__password']) &&
            isset($_POST['nuevo__rol'])

        ) {

            $nombre = $_POST['nuevo__nombre'];
            $usuario = $_POST['nuevo__nombre-usuario'];
            $email = $_POST['nuevo__email'];
            $password = $_POST['nuevo__password'];
            $rol = $_POST['nuevo__rol'];



            /**Expresiones regulares */
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $nombre) &&
                preg_match('/^[a-zA-Z0-9]+$/', $usuario) &&
                preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $email) &&
                preg_match('/^.+$/', $password)
            ) {

                /**Procesar la imagen de perfil */

                $ruta__imagen = '';

                /**Si existe la imagen y cuenta con tmp_name crear un directorio */
                if (isset($_FILES['foto__usuario']['tmp_name'])) {

                    $foto_perfil = $_FILES['foto__usuario'];
                    $tmp_name = $foto_perfil['tmp_name'];
                    $type = $foto_perfil['type'];

                    /**Directorio creado */
                    $directorio = 'vista/assets/img/usuarios/' . $usuario;
                    mkdir($directorio, 0755, true);

                    /**Imagen en formato JPEG/JPG */
                    if ($type == 'image/jpeg') {

                        /**Guardar la imagen en el directorio con un nombre aleatorio*/
                        $random = mt_rand(100, 999);
                        $ruta__imagen = 'vista/assets/img/usuarios/' . $usuario . '/' . $random . '.jpg';
                        move_uploaded_file($tmp_name, $ruta__imagen);
                    }

                    /**Imagen en formato PNG */
                    if ($type == 'image/png') {
                        /**Guardar la imagen en el directorio con un nombre aleatorio*/
                        $random = mt_rand(100, 999);
                        $ruta__imagen = 'vista/assets/img/usuarios/' . $usuario . '/' . $random . '.png';
                        move_uploaded_file($tmp_name, $ruta__imagen);
                    }
                }

                /**Encriptar password */

                $hash__password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);

                /**Array con los datos que enviaran al modelo */
                $data = array(
                    'nombre' => $nombre,
                    'nombre_usuario' => $usuario,
                    'email' => $email,
                    'password' => $hash__password,
                    'rol' => $rol,
                    'foto_perfil' => $ruta__imagen
                );

                /**Enviar datos al modelo y recepcion de una respuesta*/

                $response = ModeloUsuarios::crearUsuario($data);

                if ($response == 'success') {
                    echo '<script>
                   Swal.fire(
                    "¡Usuario creado!",
                    "Presiona ok para continuar",
                    "success"
                  ).then((result)=>{
                      if(result.value){
                          window.location = "usuarios"
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
                        window.location = "usuarios"
                    }
                })
               </script>';
            }
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                               Editar usuario                               */
    /* -------------------------------------------------------------------------- */

    static public function editarUsuario()
    {

        /**Validar que existan el id de usuario */
        if (isset($_POST['id__editar_usuario'])) {

            $id_usuario = $_POST['id__editar_usuario'];
            $nombre = $_POST['editar__nombre'];
            $usuario = $_POST['editar__nombre-usuario'];
            $email = $_POST['editar__email'];
            $password = $_POST['editar__password'];
            $password_actual = $_POST['password__actual'];
            $rol = $_POST['editar__rol'];



            /**Expresiones regulares */
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $nombre) &&
                preg_match('/^[a-zA-Z0-9]+$/', $usuario) &&
                preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $email)
                // 
            ) {

                /**Procesar la imagen de perfil */

                $ruta__imagen = $_POST['foto__establecida'];

                /**Si existe la imagen y cuenta con tmp_name crear un directorio */
                if (isset($_FILES['editar__foto_usuario']['tmp_name']) && !empty($_FILES['editar__foto_usuario']['tmp_name'])) {

                    /**Propiedades de imagen */
                    $foto_perfil = $_FILES['editar__foto_usuario'];
                    $foto_actual = $_FILES['foto__establecida'];
                    $tmp_name = $foto_perfil['tmp_name'];
                    $type = $foto_perfil['type'];

                    /**Redimensionar imagen */
                    list($width, $heigth) = getimagesize($tmp_name);
                    $newWidth = 400;
                    $newHeight = 400;

                    /**Directorio creado */
                    $directorio = 'vista/assets/img/usuarios/' . $usuario;

                    /**Verificar si existe una imagen establecida */
                    if (!empty($foto_actual)) {
                        unlink($foto_actual);
                    } else {
                        mkdir($directorio, 0755, true);
                    }
                    /**Imagen en formato JPEG/JPG */
                    if ($type == 'image/jpeg') {
                        /**Guardar la imagen en el directorio con un nombre aleatorio*/
                        $random = mt_rand(100, 999);
                        $ruta__imagen = 'vista/assets/img/usuarios/' . $usuario . '/' . $random . '.jpg';

                        /**Procesar imagen */
                        $img_actual = imagecreatefromjpeg($tmp_name);
                        $img_resized = imagecreatetruecolor($newWidth, $newHeight);

                        /**Ajustar nuevo tamaño de imagen */
                        imagecopyresized($img_resized, $img_actual, 0, 0, 0, 0, $newWidth, $newHeight, $width, $heigth);
                        imagejpeg($img_resized, $ruta__imagen);

                        // move_uploaded_file($tmp_name, $ruta__imagen);
                    }

                    /**Imagen en formato PNG */
                    if ($type == 'image/png') {
                        /**Guardar la imagen en el directorio con un nombre aleatorio*/
                        $random = mt_rand(100, 999);
                        $ruta__imagen = 'vista/assets/img/usuarios/' . $usuario . '/' . $random . '.png';

                        /**Procesar imagen */
                        $img_actual = imagecreatefrompng($tmp_name);
                        $img_resized = imagecreatetruecolor($newWidth, $newHeight);

                        /**Ajustar nuevo tamaño de imagen */
                        imagecopyresized($img_resized, $img_actual, 0, 0, 0, 0, $newWidth, $newHeight, $width, $heigth);
                        imagepng($img_resized, $ruta__imagen);

                        // move_uploaded_file($tmp_name, $ruta__imagen);
                    }
                }

                if ($password != '') {

                    if (preg_match('/^.+$/', $password)) {
                        /**Encriptar password */
                        $hash__password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
                    }
                } else {
                    $hash__password = $password_actual;
                }


                /**Array con los datos que enviaran al modelo */
                $data = array(
                    'id' => $id_usuario,
                    'nombre' => $nombre,
                    'nombre_usuario' => $usuario,
                    'email' => $email,
                    'password' => $hash__password,
                    'rol' => $rol,
                    'foto_perfil' => $ruta__imagen
                );

                /**Enviar datos al modelo y recepcion de una respuesta*/

                $response = ModeloUsuarios::editarUsuario($data);
                if ($response == 'success') {
                    echo '<script>
                   Swal.fire(
                    "¡Usuario actualizado!",
                    "Presiona ok para continuar",
                    "success"
                  ).then((result)=>{
                      if(result.value){
                          window.location = "usuarios"
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
                        window.location = "usuarios"
                    }
                })
               </script>';
            }
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                              Eliminar usuario                              */
    /* -------------------------------------------------------------------------- */

    static public function eliminarUsuario()
    {
        if (isset($_GET['id__usuario'])) {

            $id = $_GET['id__usuario'];

            if ($_GET['foto__perfil'] == '') {

                unlink($_GET['foto__perfil']);
                rmdir('vista/assets/usuarios/' . $_GET['usuario']);
            }

            $response = ModeloUsuarios::eliminarUsuario($id);

            if ($response == 'success') {
                echo '<script>
               Swal.fire(
                "¡Usuario Eliminado!",
                "Presiona ok para continuar",
                "success"
              ).then((result)=>{
                  if(result.value){
                      window.location = "usuarios"
                  }
              })
               </script>';
            }
        }
    }


    /* -------------------------------------------------------------------------- */
    /*                        Total de usuarios registrados                       */
    /* -------------------------------------------------------------------------- */

    static public function getTotalUsuarios(){

        $response = ModeloUsuarios::getTotalUsuarios();
        return $response;
    }
}
