<?php

require_once '../controladores/categorias.controlador.php';
require_once '../modelos/categorias.modelo.php';

class AjaxCategorias
{
    public $id;

    /* -------------------------------------------------------------------------- */
    /*                              Editar categoria                              */
    /* -------------------------------------------------------------------------- */

    public function AjaxEditarCategoria()
    {

        $column = 'id';
        $value = $this->id;

        $response = ControladrorCategorias::getCategorias($column, $value);
        echo json_encode($response);
    }
}

/* -------------------------------------------------------------------------- */
/*                             Objeto instanciado                             */
/* -------------------------------------------------------------------------- */

if (isset($_POST['id__categoria'])) {

    $id__categoria = new AjaxCategorias();
    $id__categoria->id = $_POST['id__categoria'];
    $id__categoria->AjaxEditarCategoria();
}
