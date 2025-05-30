<?php
$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

$tabla = 'tab_user';
$id_tabla = 'id_user';
$error = 'N';

if(!empty($_POST['sent'])){
  if (!empty($_POST['email']) && !empty($_POST['password'])){
    $email = anti_hack('email',$_POST['email']);
    $password = md5(anti_hack('password',$_POST['password']));

    $sql = querySQL_while("select * from tab_admin where email = '".$email."'");
    if($sql != 'empty'){
      
      foreach ($sql as $key => $array) {
        if ($array["password"] == $password) {
          $log = 'Y';
          session_start();
          $_SESSION['id_admin'] = $array["id_admin"];
          $_SESSION['nombre_admin'] = $array["nombre"];
          ?>
          <script>location.href='../home/home.php';</script>
          <?php       
        }
      }
    }
    if(empty($log)){ ?> 
      <p class="badge badge-danger">La contraseña no es correcta</p>
      <script>//cargar('login','$msj=error2');</script>
    <?php
    }
  }else{ ?> 
      <p class="badge badge-danger">Completa tus datos correctamente</p>
      <script>//cargar('login','$msj=error1');</script>
    <?php
  }
}
?>