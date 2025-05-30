<?php 
session_start();
if(empty($_SESSION['id_admin'])){ ?>
	<script>
		location.href='../../pages/login/login.php';
	</script>
<?php }
include($url_dir.'config/connection.php');
include($url_dir.'config/functions.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Black Whale - Panel</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo $url_dir; ?>vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo $url_dir; ?>vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo $url_dir; ?>css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo $url_dir; ?>images/logo.png" />

</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex px-3 py-2">
        <a class="navbar-brand brand-logo d-flex"  style="min-width: 70px;" href="<?php echo $url_dir; ?>pages/home/home.php"><img src="<?php echo $url_dir; ?>images/logo-header.png" height="45"></a>
        <a class="navbar-brand brand-logo-mini" href="<?php echo $url_dir; ?>pages/home/home.php"><img src="<?php echo $url_dir; ?>images/logo-header.png" width="150"></a>
      </div>

      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <span style="padding: 5px 15px 0 0;" class="text-large"><?php echo $_SESSION['nombre_admin'];?></span>
            <a class="nav-link dropdown-toggle count-indicator" href="#" data-toggle="dropdown" id="profileDropdown">
              <i class="ti-menu text-secondary"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <!--
              <a class="dropdown-item">
                <i class="ti-email text-primary"></i>
                Administradores
              </a>
              -->
              <a href="<?php echo $url_dir; ?>pages/login/logout.php" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Cerrar sesión
              </a>
            </div>
          </li>
        </ul>

      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_dir; ?>pages/home/home.php">
              <i class="ti-layers menu-icon"></i>
              <span class="menu-title">Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_dir; ?>pages/users/users.php">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">Usuarios</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_dir; ?>pages/reportes/reportes.php">
              <i class="ti-bar-chart-alt menu-icon"></i>
              <span class="menu-title">Reportes</span>
            </a>
          </li>
          <!--
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_dir; ?>pages/categorias/categorias.php">
              <i class="ti-layers menu-icon"></i>
              <span class="menu-title">Categorías</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_dir; ?>pages/trabajos/trabajos.php">
              <i class="ti-briefcase menu-icon"></i>
              <span class="menu-title">Trabajos</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_dir; ?>pages/content/content.php">
              <i class="ti-files menu-icon"></i>
              <span class="menu-title">Páginas / Bloques</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_dir; ?>pages/multimedia/multimedia.php">
              <i class="ti-gallery menu-icon"></i>
              <span class="menu-title">Multimedia</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link align-items-center" href="<?php echo $url_dir; ?>pages/mensajes/mensajes.php">
              <i class="ti-email menu-icon"></i>
              <span class="menu-title">Mensajes <label class="badge badge-primary bold"  style="position:absolute; margin:-5px 0 0 5px;"><?php total_mensajes_no_leidos(); ?></label></span>
            </a>
          </li>
          -->
          <!--
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo $url_dir; ?>pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo $url_dir; ?>pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_dir; ?>pages/forms/basic_elements.html">
              <i class="ti-layout-list-post menu-icon"></i>
              <span class="menu-title">Form elements</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_dir; ?>pages/charts/chartjs.html">
              <i class="ti-pie-chart menu-icon"></i>
              <span class="menu-title">Charts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_dir; ?>pages/tables/basic-table.html">
              <i class="ti-view-list-alt menu-icon"></i>
              <span class="menu-title">Tables</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_dir; ?>pages/icons/themify.html">
              <i class="ti-star menu-icon"></i>
              <span class="menu-title">Icons</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo $url_dir; ?>pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo $url_dir; ?>pages/samples/login-2.html"> Login 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo $url_dir; ?>pages/samples/register.html"> Register </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo $url_dir; ?>pages/samples/register-2.html"> Register 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo $url_dir; ?>pages/samples/lock-screen.html"> Lockscreen </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_dir; ?>documentation/documentation.html">
              <i class="ti-write menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
          -->
        </ul>
      </nav>