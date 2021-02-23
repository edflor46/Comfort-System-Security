<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administrar clientes</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Clientes</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCliente"><i class="fas fa-user-tie mr-1"></i> Nuevo Cliente</button>
                            <a href="nuevo-trabajo" class="btn btn-warning ml-1"><i class="fas fa-briefcase mr-1"></i>Iniciar trabajo</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tables" class="table table-bordered table-striped configTable">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 7px;">#</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th>Trabajos</th>
                                        <th>Ultimo trabajo</th>
                                        <th>Fecha de registro</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    /**Datos extraids por el controlador */
                                    $column = null;
                                    $value = null;

                                    $clientes = ControladorClientes::getClientes($column, $value);

                                    /**Recorrer los datos que contenga el controlador */
                                    if (is_array($clientes)) :
                                        foreach ($clientes as $key => $cliente) : ?>



                                            <tr class="text-center">
                                                <td><?= ($key + 1) ?></td>
                                                <td><?= $cliente['nombre_cliente'] ?></td>
                                                <td><?= $cliente['apellido_cliente'] ?></td>
                                                <td><?= $cliente['telefono'] ?></td>
                                                <td><?= $cliente['email'] ?></td>

                                                <?php
                                                if ($cliente['trabajos'] == NULL & $cliente['ultimo_trabajo'] == NULL) :
                                                ?>
                                                    <td><span class="badge badge-danger">¡Sin trabajos!</span></td>
                                                    <td><span class="badge badge-danger">¡Sin trabajos!</span></td>
                                                <?php else : ?>
                                                    <td><?= $cliente['trabajos'] ?></td>
                                                    <td><?= $cliente['ultimo_trabajo'] ?></td>

                                                <?php endif ?>
                                                <td><?= $cliente['fecha_registro'] ?></td>
                                                <td>
                                                    <button class="btn btn-warning mt-1 editarCliente text-white" id__cliente="<?= $cliente['id'] ?>" data-toggle="modal" data-target="#modalEditarCliente"><i class="fas fa-pencil-alt"></i></button>

                                                    <button class="btn btn-danger mt-1 eliminarCliente" id__cliente="<?= $cliente['id']?>" nombre__cliente="<?=$cliente['nombre_cliente']?>"><i class="fas fa-trash-alt"></i></i></button>
                                                </td>
                                            </tr>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>

                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->
</div>

<!--Modal Agregar Cliente-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">

    <div class="modal-dialog">
        <!--Content Modal-->
        <div class="modal-content">

            <!--Form-->
            <form method="POST" role="form" id="form__cliente">

                <!--Modal header-->
                <div class="modal-header bg-success">
                    <h4><i class="fas fa-user-tag mr-1"></i> Nuevo Cliente</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>

                <!--Modal Body-->
                <div class="modal-body bg-light">

                    <!--Nombre-->
                    <div class="form-group">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-tag"></i></span>
                            </div>

                            <input type="text" id="nombre__cliente" name="nombre__cliente" class="form-control input-lg" placeholder="Ingresar nombre del cliente" aria-describedby="addon-wrapping">
                        </div>
                    </div>

                    <!--Apellidos-->
                    <div class="form-group">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-tag"></i></span>
                            </div>

                            <input type="text" id="apellido__cliente" name="apellido__cliente" class="form-control input-lg" placeholder="Ingresar apellido del cliente" aria-describedby="addon-wrapping">
                        </div>
                    </div>

                    <!--Telefono-->
                    <div class="form-group">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-phone"></i></span>
                            </div>

                            <input type="text" class="form-control" id="telefono__cliente" name="telefono__cliente" placeholder="Ingresar telefono del cliente" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                            
                        </div>
                    </div>

                    <!--Email-->
                    <div class="form-group">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-at"></i></span>
                            </div>

                            <input type="email" id="email__cliente" name="email__cliente" class="form-control input-lg" placeholder="Ingresar email del cliente" aria-describedby="addon-wrapping">
                        </div>
                    </div>

                    <!--Modal Footer-->
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-success">Registrar cliente</button>
                    </div>

                </div>


                <?php
                $crear = ControladorClientes::crearCliente();
                ?>

            </form>
        </div>
    </div>

</div>

<!--Modal editar cliente-->

<div id="modalEditarCliente" class="modal fade" role="dialog">

    <div class="modal-dialog">
        <!--Content Modal-->
        <div class="modal-content">

            <!--Form-->
            <form method="POST" role="form" id="form__cliente">

                <!--Modal header-->
                <div class="modal-header bg-success">
                    <h4><i class="fas fa-user-tag mr-1"></i> Editar Cliente</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>

                <!--Modal Body-->
                <div class="modal-body bg-light">

                    <!--Nombre-->
                    <div class="form-group">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-tag"></i></span>
                            </div>

                            <input type="text" id="editar__nombre-cliente" name="editar__nombre-cliente" class="form-control input-lg" aria-describedby="addon-wrapping">

                            <input type="hidden" name="id__cliente" id="id__cliente">
                        </div>
                    </div>

                    <!--Apellidos-->
                    <div class="form-group">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-tag"></i></span>
                            </div>

                            <input type="text" id="editar__apellido-cliente" name="editar__apellido-cliente" class="form-control input-lg" aria-describedby="addon-wrapping">

                        </div>
                    </div>

                    <!--Telefono-->
                    <div class="form-group">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-phone"></i></span>
                            </div>

                            <input type="text" id="editar__telefono-cliente" name="editar__telefono-cliente" class="form-control input-lg" aria-describedby="addon-wrapping" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                        </div>
                    </div>

                    <!--Email-->
                    <div class="form-group">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-at"></i></span>
                            </div>

                            <input type="email" id="editar__email-cliente" name="editar__email-cliente" class="form-control input-lg" aria-describedby="addon-wrapping">
                        </div>
                    </div>

                    <!--Modal Footer-->
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-success">Actualizar cliente</button>
                    </div>

                </div>


                <?php
                $editar__cliente = ControladorClientes::editarCliente();

                ?>

            </form>
        </div>
    </div>

</div>
<?php
$eliminar__cliente = ControladorClientes::eliminarCliente();
?>