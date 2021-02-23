<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administrar categorias</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Categorias</li>
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
                            <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCategoria"><i class="fas fa-box-open"></i> Nueva Categoria</button>
                            <a href="nuevo-trabajo" class="btn btn-warning ml-1"><i class="fas fa-briefcase mr-1"></i>Iniciar trabajo</a>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tables" class="table table-bordered table-striped configTable">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 7px;">#</th>
                                        <th>Categoria</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    /**Datos extraids por el controlador */
                                    $column = null;
                                    $value = null;

                                    $getCategorias = ControladrorCategorias::getCategorias($column, $value);

                                    /**Recorrer los datos que contenga el controlador */
                                    foreach ($getCategorias as $key => $categoria) : ?>

                                        <tr class="text-center">
                                            <td><?= ($key + 1) ?></td>
                                            <td><?= $categoria['nombre_categoria'] ?></td>
                                            <td>
                                                <button class="btn btn-warning editarCategoria" id__categoria="<?= $categoria['id'] ?>" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fas fa-pencil-alt"></i></button>

                                                <button class="btn btn-danger eliminarCategoria" id__categoria="<?= $categoria['id'] ?>" nombre__categoria="<?= $categoria['nombre_categoria'] ?>"><i class="fas fa-trash-alt"></i></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

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

<!--Modal Agregar Categoria-->

<div id="modalAgregarCategoria" class="modal fade" role="dialog">

    <div class="modal-dialog">
        <!--Content Modal-->
        <div class="modal-content">

            <!--Form-->
            <form method="POST" role="form" id="form__categoria">

                <!--Modal header-->
                <div class="modal-header bg-success">
                    <h4><i class="fas fa-parachute-box"></i> Nueva Categoria</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                
                </div>

                <!--Modal Body-->
                <div class="modal-body bg-light">

                    <!--Nombre-->
                    <div class="form-group">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-box-open"></i></span>
                            </div>

                            <input type="text" id="nueva__categoria" name="nueva__categoria" class="form-control input-lg" placeholder="Ingresar categoria" aria-describedby="addon-wrapping">
                        </div>
                    </div>

                    <!--Modal Footer-->
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-success">Registrar categoria</button>
                    </div>

                </div>


                <?php
                $crearCategoria = ControladrorCategorias::crearCategoria();

                ?>

            </form>
        </div>
    </div>

</div>

<!--Modal editar categoria-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">

    <div class="modal-dialog">
        <!--Content Modal-->
        <div class="modal-content">

            <!--Form-->
            <form method="POST" role="form" id="form__editar-categoria">

                <!--Modal header-->
                <div class="modal-header bg-success">
                    <h4><i class="fas fa-box-open"></i> Editar Categoria</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>

                <!--Modal Body-->
                <div class="modal-body bg-light">

                    <!--Nombre-->
                    <div class="form-group">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-box-open"></i></span>
                            </div>

                            <input type="text" id="editar__categoria" name="editar__categoria" class="form-control input-lg" aria-describedby="addon-wrapping">
                        </div>
                    </div>

                    <input type="hidden" name="idCategoria" id="idCategoria">

                    <!--Modal Footer-->
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-success">Actualizar categoria</button>
                    </div>

                </div>


                <?php
                $editar__categoria = ControladrorCategorias::editarCategoria();

                ?>

            </form>
        </div>
    </div>

</div>
<?php
$eliminar__categoria = ControladrorCategorias::eliminarCategoria();
?>