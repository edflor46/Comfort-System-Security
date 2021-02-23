 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="#" class="brand-link">
         <img src="vista/assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-2" style="background: #ccc">
         <span class="brand-text font-weight-light" style="font-size: 15px;">Comfort System & Security</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel align-middle mt-1 mb-1 pb-1  d-flex">

             <?php if ($_SESSION['foto_perfil'] == null) : ?>
                 <img src="vista/assets/img/batman.png" class="img-circle elevation-3 m-user" alt="<?= $_SESSION['nombre'] ?>">

             <?php else : ?>
                 <img src="<?= $_SESSION['foto_perfil'] ?>" class="img-circle elevation-3 mt-2 m-user" alt="<?= $_SESSION['nombre'] ?>">

             <?php endif; ?>
             <div class="info">
                 <a href="#" class="d-block"><?= $_SESSION['nombre'] ?></a>
                 <span class="text-white"><?=$_SESSION['rol']?></span>
             </div>

         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <li class="nav-item">
                     <a href="inicio" class="nav-link">
                         <i class="fas fa-home"></i>
                         <p>Inicio</p>
                     </a>
                 </li>
                 <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'Administrador'): ?>
                 <li class="nav-item">
                     <a href="usuarios" class="nav-link">
                         <i class="fas fa-users"></i>
                         <p>Usuarios</p>
                     </a>
                 </li>
                 <?php endif ?>

                 <li class="nav-item">
                     <a href="categorias" class="nav-link">
                         <i class="fas fa-box-open"></i>
                         <p>Categorias</p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="clientes" class="nav-link">
                         <i class="fas fa-user-tag"></i>
                         <p>Clientes</p>
                     </a>
                 </li>

                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="fas fa-tools"></i>
                         <p>
                             Trabajos
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="trabajos" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Administrar Trabajos</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="nuevo-trabajo" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Nuevo Trabajo</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-item">
                     <a href="salir" class="nav-link">
                         <i class="fas fa-sign-out-alt"></i>
                         <p>Cerrar sesión</p>
                     </a>
                 </li>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>