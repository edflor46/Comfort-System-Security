<?php

require_once '../controladores/usuarios.controlador.php';

require_once '../modelos/usuarios.modelo.php';

class AjaxUsuarios
{
    public $id__usuario;
    public $validar__usuario;

    /* -------------------------------------------------------------------------- */
    /*                               Editar Usuario                               */
    /* -------------------------------------------------------------------------- */

    public function ajaxEditarUsuario()
    {

        $column = 'id';
        $value = $this->id__usuario;

        $response = ControladorUsuarios::getUsers($column, $value);
        echo json_encode($response);
    }

    /* -------------------------------------------------------------------------- */
    /*                              Usuario repetido                              */
    /* -------------------------------------------------------------------------- */
    public function ajaxValidarUsuario()
    {
        $column = 'nombre_usuario';
        $value = $this->validar__usuario;
        $response = ControladorUsuarios::getUsers($column, $value);
        echo json_encode($response);
    }
}


/**objeto editar usuario */

if (isset($_POST['id__usuario'])) {
    $editar = new AjaxUsuarios();
    $editar->id__usuario = $_POST['id__usuario'];
    $editar->ajaxEditarUsuario();
}

/* -------------------------------------------------------------------------- */
/*                           Objeto validar usuario                           */
/* -------------------------------------------------------------------------- */

if(isset($_POST['usuario'])){

    $user = new AjaxUsuarios();
    $user->validar__usuario = $_POST['usuario'];
    $user->ajaxValidarUsuario();
}
