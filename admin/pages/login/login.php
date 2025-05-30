<?php
$title='';
$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Iniciar sesión</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg" style="background: #FFF;">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="../../images/logo-sm-multicolor.png" alt="Black Whale">
              </div>
              
              <h4>Bienvenido!</h4>
              <h6 class="font-weight-light">ingresa tus datos para iniciar sesión</h6>
              
              <form class="pt-3" action="_save.php" method="POST" id="form1">
                <div class="form-group">
                  <label for="exampleInputEmail">E-mail</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                    <input type="email" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="E-mail" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Contraseña</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-lock text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password" name="password">                        
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <!--<div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Mantenerme logueado
                    </label>
                  </div>
                  
                  <a href="#" class="auth-link text-black">Olvidaste tu contraseña?</a>
                  -->
                </div>
                <div class="my-3">
                  <input type="hidden" name="sent" value="ok">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.php">INGRESAR</button>
                </div>
                <div id="canvas"></div>
              </form>

            

            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/todolist.js"></script>
  <script src="../../js/functions.js"></script>
  <!-- endinject -->

  <script>
    $(document).ready(function(){
        $('#form1').submit(function(){
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(data) {
                    $('#canvas').html(data);
                }
            })
            return false;
        }); 
    }); 
    </script>
</body>

</html>
