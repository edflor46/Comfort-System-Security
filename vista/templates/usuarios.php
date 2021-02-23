<?php

$administrador = new Config();
$administrador->isAdmin();

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administración de usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
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
                            <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarUsuario"><i class="fas fa-user-plus mr-1"></i> Nuevo usuario</button>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tables" class="table table-bordered table-striped configTable">
                                <thead>
                                    <tr>
                                        <th style="width: 7px;">#</th>
                                        <th>Foto</th>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th>Ultima conexion</th>
                                        <th>Registro</th>
                                        <th>Acciones</th>
                                    
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    /**Datos extraids por el controlador */
                                    $column = null;
                                    $value = null;

                                    $getAll = ControladorUsuarios::getUsers($column, $value);

                                    /**Recorrer los datos que contenga el controlador */
                                    foreach ($getAll as $key => $usuario) : ?>
                                        <tr>
                                            <td><?= ($key + 1) ?></td>
                                            <td>
                                                <?php if ($usuario['foto_perfil'] == null) : ?>
                                                    <img src="vista/assets/img/no_foto.png" width="50px" alt="<?= $usuario['nombre'] ?>">
                                                <?php else : ?>
                                                    <img src="<?= $usuario['foto_perfil'] ?>" class="img_thumbnail img-circle elevation-3 m-user " width="50px" alt="<?= $usuario['nombre'] ?>">
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $usuario['nombre'] ?></td>
                                            <td><?= $usuario['nombre_usuario'] ?></td>
                                            <td><?= $usuario['email'] ?></td>
                                            <td><?= $usuario['rol'] ?></td>
                                            <td><?= $usuario['ultimo_login'] ?></td>
                                            <td><?= $usuario['fecha_registro'] ?></td>
                                           
                                            <td>
                                                <button class="btn btn-warning editarUsuario text-white m-1" id__usuario="<?= $usuario['id'] ?>" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-pencil-alt"></i></button>

                                                <button class="btn btn-danger eliminarUsuario m-1" id__usuario="<?= $usuario['id'] ?>" foto__perfil="<?=$usuario['foto_perfil']?>" usuario="<?=$usuario['nombre_usuario']?>"><i class="fas fa-trash-alt"></i></i></button>
                                            </td>
                                            
                                        </tr>

                                    <?php endforeach; ?>

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

<!--Modal Agregar usuario-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">

    <div class="modal-dialog">
        <!--Content Modal-->
        <div class="modal-content">

            <!--Form-->
            <form method="POST" role="form" enctype="multipart/form-data" id="form">

                <!--Modal header-->
                <div class="modal-header bg-success">
                    <h4><i class="fas fa-user-plus mr-1"></i> Nuevo Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>

                <!--Modal Body-->
                <div class="modal-body bg-light">

                    <!--Nombre-->
                    <div class="form-group">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-alt"></i></span>
                            </div>

                            <input type="text" id="nuevo__nombre" name="nuevo__nombre" class="form-control input-lg" placeholder="Ingresar nombre" aria-describedby="addon-wrapping">
                        </div>
                    </div>

                    <!--Nombre Usuario-->
                    <div class="form-group">
                        <div class="input-group flex-nowrap">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-address-card"></i></span>
                            </div>

                            <input type="text" id="nuevo__nombre-usuario" name="nuevo__nombre-usuario" class="form-control input-lg" placeholder="Ingresar nombre de usuario" aria-describedby="addon-wrapping">
                        </div>
                    </div>

                    <!--Email-->
                    <div class="form-group">
                        <div class="input-group flex-nowrap">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-at"></i></span>
                            </div>

                            <input type="email" id="nuevo__email" name="nuevo__email" class="form-control input-lg" placeholder="Ingresar correo electronico" aria-describedby="addon-wrapping">
                        </div>
                    </div>

                    <!--password-->
                    <div class="form-group">
                        <div class="input-group flex-nowrap">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-lock"></i></span>
                            </div>

                            <input type="password" id="nuevo__password" name="nuevo__password" class="form-control input-lg" placeholder="Ingresar contraseña" aria-describedby="addon-wrapping">
                        </div>
                    </div>

                    <!--Rol-->
                    <div class="form-group">
                        <div class="input-group flex-nowrap">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-tag"></i></span>
                            </div>

                            <select class="custom-select" name="nuevo__rol" id="nuevo__rol">
                                <option selected>Selecciona un rol para este usuario</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Super Usuario">Super Usuario</option>
                                <option value="Usuario">Usuario</option>
                            </select>
                        </div>
                    </div>


                    <!--Foto de perfil-->
                    <div class="form-group">
                        <label for="imagen__usuario">Cargar foto de perfil</label>
                        <input type="file" class="form-control-file foto__usuario" name="foto__usuario">
                        <p>El tamaño de la imagen debe ser menor a 2MB</p>
                        <img src="vista/assets/img/no_foto.png" class="loaded__img" width="100px">

                    </div>

                    <!--Modal Footer-->
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-success">Registrar usuario</button>
                    </div>

                </div>


                <?php
                $crearUsuario = ControladorUsuarios::crearUsuario();

                ?>

            </form>
        </div>
    </div>

</div>

<div id="modalEditarUsuario" class="modal fade" role="dialog">

    <div class="modal-dialog">
        <!--Content Modal-->
        <div class="modal-content">

            <!--Form-->
            <form method="POST" role="form" enctype="multipart/form-data" id="editar__form">

                <!--Modal header-->
                <div class="modal-header bg-success">
                    <h4><i class="fas fa-user-plus mr-1"></i> Editar Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>

                <!--Modal Body-->
                <div class="modal-body bg-light">

                    <!--Nombre-->
                    <div class="form-group">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-alt"></i></span>
                            </div>

                            <input type="text" id="editar__nombre" name="editar__nombre" class="form-control input-lg" aria-describedby="addon-wrapping">
                        </div>
                    </div>

                    <!--Nombre Usuario-->
                    <div class="form-group">
                        <div class="input-group flex-nowrap">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-address-card"></i></span>
                            </div>

                            <input type="text" id="editar__nombre-usuario" name="editar__nombre-usuario" class="form-control input-lg" aria-describedby="addon-wrapping">
                        </div>
                    </div>

                    <!--Email-->
                    <div class="form-group">
                        <div class="input-group flex-nowrap">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-at"></i></span>
                            </div>

                            <input type="email" id="editar__email" name="editar__email" class="form-control input-lg" aria-describedby="addon-wrapping">
                        </div>
                    </div>

                    <!--password-->
                    <div class="form-group">
                        <div class="input-group flex-nowrap">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-lock"></i></span>
                            </div>

                            <input type="password" id="editar__password" name="editar__password" class="form-control input-lg" placeholder="Ingresa una nueva contraseña" aria-describedby="addon-wrapping">

                            <input type="hidden" id="password__actual" name="password__actual">
                        </div>
                    </div>

                    <!--Rol-->
                    <div class="form-group">
                        <div class="input-group flex-nowrap">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-tag"></i></span>
                            </div>

                            <select class="custom-select" name="editar__rol">
                                <option value="" id="editar__rol">Elige una opción</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Usuario">Usuario</option>
                            </select>
                        </div>
                    </div>


                    <!--Foto de perfil-->
                    <div class="form-group">
                        <label for="imagen__usuario">Cargar foto de perfil</label>
                        <input type="file" class="form-control-file foto__usuario" name="editar__foto_usuario">
                        <p>El tamaño de la imagen debe ser menor a 2MB</p>
                        <img src="vista/assets/img/no_foto.png" class="loaded__img img_thumbnail" width="100px">

                        <input type="hidden" name="foto__establecida" id="foto__establecida">
                    </div>

                    <!--Modal Footer-->
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-success">Actualizar usuario</button>
                    </div>

                    <input type="hidden" name="id__editar_usuario" id="id__editar_usuario">

                </div>

                <?php
                $editar__usuario = ControladorUsuarios::editarUsuario();
                ?>
            </form>
        </div>
    </div>

</div>

<?php 

$eliminar = ControladorUsuarios::eliminarUsuario();

?>