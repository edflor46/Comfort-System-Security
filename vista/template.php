<?php session_start(); ?>


<!DOCTYPE html>
<html>

<!--

FOGE591013HGRLRD01
residencia
baja califotnia sur cabo san lucas
cp 23462
n_contacto: 6242285804. uliseseduardo959@gmail.com
completado el regitro, la plataforma generara una clave de registro a manera de comprobante

en caso de error en los datos de registro existe un boton de contacto pra solicitar que se le llame
´por telefono para rectificar la informacion


Folio: AM-17703463

-->


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Comfort System & Security</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--FavIcon-->
    <link rel="shortcut icon" href="vista/assets/img/logo.png" type="image/x-icon">
    <!--CSS-->
    <link rel="stylesheet" href="vista/assets/css/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="vista/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="vista/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="vista/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="vista/plugins/jqvmap/jqvmap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="vista/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vista/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="vista/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="vista/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="vista/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="vista/plugins/summernote/summernote-bs4.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="vista/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="vista/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">

    <!--SweetAlert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed">

    <?php


    if (isset($_SESSION['login']) && $_SESSION['login'] == 'autenticado') {

        echo '<div class="wrapper">';

        require_once 'templates/nav.php';
        require_once 'templates/aside.php';

        /* ------------------------ Configuracion del ROUTER ------------------------ */
        if (isset($_GET['url'])) {

            $url = $_GET['url'];

            if ($url == 'inicio' || $url == 'usuarios' || $url == 'categorias' || $url == 'inventario' || $url == 'clientes' || $url == 'trabajos' || $url == 'nuevo-trabajo' || $url == 'reportes' || $url == 'colaboradores' || $url == 'salir') {

                include 'templates/' . $url . '.php';
            } else {
                include 'templates/404.php';
            }
        } else {
            include 'templates/inicio.php';
        }

        include 'templates/footer.php';

        echo '</div>';
    } else {
        include 'templates/login.php';
    }

    ?>



    <!-- jQuery -->
    <script src="vista/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="vista/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Select2 -->
    <script src="vista/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="vista/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->

    <!-- DataTables -->
    <script src="vista/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="vista/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vista/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vista/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- daterangepicker -->
    <script src="vista/plugins/moment/moment.min.js"></script>
    <script src="vista/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="vista/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="vista/plugins/summernote/summernote-bs4.min.js"></script>
    <!--InputMask-->
    <script src="vista/plugins/moment/moment.min.js"></script>
    <script src="vista/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- bootstrap color picker -->
    <script src="vista/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="vista/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="vista/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="vista/dist/js/demo.js"></script>
    <!-- jQueryNumber -->
    <script src="vista/plugins/jqueryNumber/jquerynumber.min.js"></script>
    <!-- General JS -->
    <script src="vista/js/main.js"></script>
    <!--Login-->
    <script src="vista/js/login.js"></script>
    <!--Usuarios-->
    <script src="vista/js/usuarios.js"></script>
    <!--Categorias-->
    <script src="vista/js/categorias.js"></script>
    <!--Clientes-->
    <script src="vista/js/clientes.js"></script>
    <!--Colaboradores-->
    <script src="vista/js/colaboradores.js"></script>
    <!--Trabajos-->
    <script src="vista/js/trabajos.js"></script>
</body>

</html>