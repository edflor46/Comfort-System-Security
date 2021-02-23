<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administrar Trabajos</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Trabajos</li>
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
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tables" class="table table-bordered table-striped configTable">
                                <thead>

                           
                                    <tr class="text-center">
                                        <th style="width: 7px;">#</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Cliente</th>
                                        <th>Categoria</th>
                                        <th>Telefono</th>
                                        <th>Inicio</th>
                                        <th>Final</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php
                                
                                $get = ControladorTrabajos::getTrabajos();

                                foreach($get as $key => $trabajo):?>



                                            <tr class="text-center">
                                                <td><?= ($key + 1) ?></td>
                                                <td><?= $trabajo['nombre_trabajo'] ?></td>
                                                <td><?= $trabajo['descripcion_trabajo'] ?></td>
                                                <td><?= $trabajo['nombre_cliente'].' '.$trabajo['apellido_cliente'] ?></td>
                                                <td><?= $trabajo['nombre_categoria'] ?></td>
                                                <td><?= $trabajo['telefono'] ?></td>
                                                <td><?=$trabajo['fecha_inicio']?></td>
                                                <td><?=$trabajo['fecha_final']?></td>
                                                <td><?=$trabajo['total']?> MXN</td>
                                            </tr>
                                    <?php endforeach?>

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