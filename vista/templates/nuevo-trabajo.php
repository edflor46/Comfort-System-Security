 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Nuevo Trabajo</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                         <li class="breadcrumb-item active">Nuevo Trabajo</li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>
     <div class="content">
         <div class="container-fluid">
             <div class="row justify-content-center">
                 <div class="col-md-9 d-grid col-xs-12">
                     <div class="card card-danger">
                         <div class="card-header">
                             <h3 class="card-tittle"><i class="fas fa-briefcase mr-1"></i>Datos del trabajo</h3>
                         </div>

                         <div class="card-body">
                             <form method="POST" role="form">
                                 <div class="form-group">

                                     <!--Nombre trabajo-->
                                     <div class="form-group">
                                         <div class="input-group flex-nowrap">

                                             <div class="input-group-prepend">
                                                 <span class="input-group-text" id="addon-wrapping"><i class="fas fa-file-signature"></i></span>
                                             </div>

                                             <input type="text" id="nuevo__nombre-trabajo" name="nuevo__nombre-trabajo" class="form-control input-lg" placeholder="Ingresar nombre del trabajo" aria-describedby="addon-wrapping">

                                         </div>
                                     </div>

                                     <!--Cliente-->
                                     <div class="form-group">
                                         <div class="input-group flex-nowrap">

                                             <div class="input-group-prepend">
                                                 <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-tag"></i></span>
                                             </div>


                                             <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" name="select__cliente_trabajo" id="select__cliente" style="width: 100%;">

                                                 <option selected="selected">Elige un cliente</option>
                                                 <?php
                                                    /**Datos extraids por el controlador */
                                                    $column = null;
                                                    $value = null;

                                                    $clientes = ControladorClientes::getClientes($column, $value);

                                                    /**Recorrer los datos que contenga el controlador */
                                                    if (is_array($clientes)) :
                                                        foreach ($clientes as $key => $cliente) : ?>
                                                         <option value="<?= $cliente['id'] ?>"><?= $cliente['nombre_cliente'] ?> <?= $cliente['apellido_cliente'] ?></option>

                                                 <?php
                                                        endforeach;
                                                    endif;
                                                    ?>
                                             </select>

                                             <span class="input-group-addon ml-1">
                                                 <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal"><i class="fas fa-user-plus mr-1"></i>Cliente</button>
                                             </span>
                                         </div>
                                     </div>

                                     <!--Categoria-->

                                     <div class="form-group">
                                         <div class="input-group flex-nowrap">

                                             <div class="input-group-prepend">
                                                 <span class="input-group-text" id="addon-wrapping"><i class="fas fa-box-open"></i></span>
                                             </div>


                                             <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" name="select__categoria_trabajo" id="select__categoria" style="width: 100%;">

                                                 <option selected="selected">Elige una categoria</option>
                                                 <?php
                                                    /**Datos extraids por el controlador */
                                                    $column = null;
                                                    $value = null;

                                                    $categorias = ControladrorCategorias::getCategorias($column, $value);

                                                    /**Recorrer los datos que contenga el controlador */
                                                    if (is_array($categorias)) :
                                                        foreach ($categorias as $key => $categoria) : ?>
                                                         <option value="<?= $categoria['id'] ?>"><?= $categoria['nombre_categoria'] ?></option>

                                                 <?php
                                                        endforeach;
                                                    endif;
                                                    ?>
                                             </select>

                                             <span class="input-group-addon ml-1">
                                                 <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalAgregarCategoria" data-dismiss="modal"><i class="fas fa-calendar-plus mr-1"></i> Categoria
                                                 </button>
                                             </span>
                                         </div>
                                     </div>

                                     <!--Descripciom-->
                                     <div class="form-group">
                                         <label>Descripción</label>
                                         <div class="input-group flex-nowrap">
                                             <textarea class="form-control text-area" rows="4" name="descripcion_trabajo" placeholder="Añade una descripción"></textarea>
                                         </div>
                                     </div>

                                     <!--Fechas inicio y final-->
                                     <div class="row d-flex justify-content-between">
                                         <div class="col-md-5">
                                             <div class="form-group">
                                                 <label>Fecha de inicio:</label>
                                                 <div class="input-group date" id="fecha__inicio" data-target-input="nearest">
                                                     <div class="input-group-append" data-target="#fecha__inicio" data-toggle="datetimepicker">
                                                         <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                                     </div>

                                                     <input type="text" name="fecha__inicio_trabajo" class="form-control datetimepicker-input" data-target="#fecha__inicio" />

                                                 </div>
                                             </div>
                                         </div>

                                         <div class="col-md-5">
                                             <div class="form-group">
                                                 <label>Fecha Final:</label>
                                                 <div class="input-group date" id="fecha__final" data-target-input="nearest">

                                                     <div class="input-group-append" data-target="#fecha__final" data-toggle="datetimepicker">
                                                         <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                                     </div>

                                                     <input type="text" name="fecha__final_trabajo" class="form-control datetimepicker-input" data-target="#fecha__final" />

                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <hr>

                                     <div class="row">
                                         <!--Total-->
                                         <div class="col-md-4">
                                             <div class="form-group">
                                                 <label>Costo total:</label>
                                                 <div class="input-group">

                                                     <div class="input-group-append">
                                                         <div class="input-group-text"><i class="fas fa-coins"></i></div>
                                                     </div>

                                                     <input type="text" class="form-control" name="trabajo__total" id="trabajo__total" placeholder="Costo total">
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <!--Form-group-->
                                 <div class="card-footer bg-white">
                                     <button type="submit" class="btn btn-danger  d-flex ml-auto">Generar Trabajo</button>
                                 </div>
                                 <!--Card-footer-->
                             </form>
                             <!--Form-->

                             <?php
                                $generarTrabajo = ControladorTrabajos::CrearTrabajo();
                                ?>


                         </div>
                         <!--Card-body-->
                     </div>
                     <!--card-->
                 </div>
             </div>
             <!--row-->
         </div>
         <!--Container-fluid-->
     </div>
     <!--Content-->
 </div>
 <!--Container-->


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

 <!--Modal Agregar Cliente-->

 <div id="modalAgregarColaborador" class="modal fade" role="dialog">

     <div class="modal-dialog">
         <!--Content Modal-->
         <div class="modal-content">

             <!--Form-->
             <form method="POST" role="form" id="form__colaborador-editar">

                 <!--Modal header-->
                 <div class="modal-header bg-success">
                     <h4><i class="fas fa-user-astronaut mr-1"></i></i> Nuevo Colaborador</h4>
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

                             <input type="text" id="nombre__colaborador" name="nombre__colaborador" class="form-control input-lg" placeholder="Ingresar nombre del colaborador" aria-describedby="addon-wrapping">
                         </div>
                     </div>

                     <!--contacto-->
                     <div class="form-group">
                         <div class="input-group flex-nowrap">
                             <div class="input-group-prepend">
                                 <span class="input-group-text" id="addon-wrapping"><i class="fas fa-phone"></i></span>
                             </div>

                             <input type="text" class="form-control" id="telefono__colaborador" name="telefono__colaborador" placeholder="Ingresar telefono del colaborador" data-inputmask='"mask": "(999) 999-9999"' data-mask>

                         </div>
                     </div>

                     <!--rol-->
                     <div class="form-group">
                         <div class="input-group flex-nowrap">
                             <div class="input-group-prepend">
                                 <span class="input-group-text" id="addon-wrapping"><i class="fas fa-at"></i></span>
                             </div>

                             <input type="text" id="rol__colaborador" name="rol__colaborador" class="form-control input-lg" placeholder="Ingresar rol del cliente" aria-describedby="addon-wrapping">
                         </div>
                     </div>

                     <!--Modal Footer-->
                     <div class="modal-footer justify-content-between">
                         <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                         <button type="submit" class="btn btn-success">Registrar colaborador</button>
                     </div>

                 </div>


                 

             </form>
         </div>
     </div>

 </div>