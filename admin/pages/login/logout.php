<?php session_start();
$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');
//$query = "update tab_user set id_extreme='' where id_user = '".$_SESSION['id_user']."'";
//$result = mysqli_query($link,$query) or die (mysqli_error());

//guardar logout
//$queryLog = "INSERT INTO tab_logs (fecha,accion,id_user,ip) VALUES (NOW(),'O','".$_SESSION["id_user"]."','')";
//$resultLog = mysqli_query($link,$queryLog) or die(mysqli_error());

session_destroy();
?>
<script type="text/javascript">
location.href='../../index.php';
</script>
