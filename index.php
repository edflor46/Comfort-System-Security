<?php

/**Config*/
require_once 'config/config.php';
/**Controladores */
require_once 'controladores/controlador.template.php';
require_once 'controladores/usuarios.controlador.php';
require_once 'controladores/categorias.controlador.php';
require_once 'controladores/clientes.controlador.php';
require_once 'controladores/trabajos.controlador.php';

/**Modelos */
require_once 'modelos/usuarios.modelo.php';
require_once 'modelos/categorias.modelo.php';
require_once 'modelos/clientes.modelo.php';
require_once 'modelos/trabajos.modelo.php';


/**Instancia de la vista */
$app = new ControladorTemplate();
$app ->vistaControlador();