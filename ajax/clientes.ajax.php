
<?php
require_once '../controladores/clientes.controlador.php';
require_once '../modelos/clientes.modelo.php';
class AjaxClientes
{
    public $id__cliente;
    /* -------------------------------------------------------------------------- */
    /*                                   Editar                                   */
    /* -------------------------------------------------------------------------- */

    public function ajaxEditarCliente()
    {
        $column = 'id';
        $value = $this->id__cliente;

        $response = ControladorClientes::getClientes($column, $value);
        echo json_encode($response);
    }
}

/* -------------------------------------------------------------------------- */
/*                                 Instancias                                 */
/* -------------------------------------------------------------------------- */

if(isset($_POST['id__cliente'])){

    $id_cliente = new AjaxClientes();
    $id_cliente->id__cliente = $_POST['id__cliente'];
    $id_cliente->ajaxEditarCliente();
}
