<?php
require_once '../controladores/colaboradores.controlador.php';
require_once '../modelos/colaboradores.modelo.php';

class AjaxColaboradores
{

    public $id_colaborador;
    public $estado_id;
    public $estado_col;

    public $id_colaborador_trabajo;
    /* -------------------------------------------------------------------------- */
    /*                                   Editar                                   */
    /* -------------------------------------------------------------------------- */
    public function editar()
    {

        $column = 'id';
        $value = $this->id_colaborador;

        $response = ControladorColaboradores::getColaboradores($column, $value);
        echo json_encode($response);
    }

    /* -------------------------------------------------------------------------- */
    /*                               Cambiar Estado                               */
    /* -------------------------------------------------------------------------- */

    public function estado()
    {

        // $estado = $this->estado_col;
        // $id = $this->estado_id;

        // $response = ModeloColaboradores::editarEstado($id, $estado);
        // echo $response;

        $tabla = 'equipo_trabajo';
        $item1 = 'estado';

        $valor1 = $this->estado_col;

        $item2 = 'id';
        $valor2 = $this->estado_id;

        $response = ModeloColaboradores::editarEstado($tabla, $item1, $valor1, $item2, $valor2);
        json_encode($response);
    }

    /* -------------------------------------------------------------------------- */
    /*                              getColaborador                                */
    /* -------------------------------------------------------------------------- */

    public function colaborador(){

        $column = 'id';
        $value = $this->id_colaborador_trabajo;

        $response = ControladorColaboradores::getColaboradores($column, $value);
        echo json_encode($response);

    }
}


/* -------------------------------------------------------------------------- */
/*                                 Instancias                                 */
/* -------------------------------------------------------------------------- */

/**Editar */

if (isset($_POST['id__col'])) {

    $id__col = new AjaxColaboradores();
    $id__col->id_colaborador = $_POST['id__col'];
    $id__col->editar();
}

/**estado */
if (isset($_POST['estado__col'])) {

    $estado__col = new AjaxColaboradores();
    $estado__col->estado_col = $_POST['estado__col'];
    $estado__col->estado_id = $_POST['id__col'];
    $estado__col->estado();
}

/**Colaborador */

if(isset($_POST['id_colaborador'])){

    $id__colaborador = new AjaxColaboradores();
    $id__colaborador ->id_colaborador_trabajo = $_POST['id_colaborador'];
    $id__colaborador->colaborador();
}