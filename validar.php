<?php
$page='validar';
$title='Validación';
session_start(); 

if(!empty($_GET['token'])){
    $token = $_GET['token'];
}else{
    ?>
    <script>location.href='iniciar-sesion';</script>
    <?php
    exit();
}

$tabla = 'tab_user';
$id_tabla = 'id_user';
?>

<?php include("includes/head.php"); ?>


<?php //validamos que el token este guardado
$row = querySQL("select * from ".$tabla." where token = '".$token."'");


if(!empty($row['id_user'])){ 

    $_SESSION['id_user'] = $row['id_user'];
    $_SESSION['name_user'] = $row['nombre'];
    $_SESSION['tipo_user'] = $row['tipo'];

    $id_user = $row['id_user'];

    $query = "update ".$tabla." set
    token='',
    estado='A'
    where ".$id_tabla." = ".$id_user;
    $result = mysqli_query($link,$query);

    // save notificaciones //
    $tituloNoti = '<strong>Cuenta validada</strong>';
    $mensajeNoti = '<br>Tu cuenta fue validada correctamente.';

    $queryNoti = "INSERT INTO tab_notificaciones (id_user,id_producto,fecha,tipo,titulo,mensaje,estado) 
    VALUES ('$id_user','',NOW(),'USE','$tituloNoti','$mensajeNoti','A')";
    $resultNoti = mysqli_query($link,$queryNoti) or die(mysql_error());


    // save notificaciones //
    $tituloNoti = '<strong>Completa tus datos</strong>';
    $mensajeNoti = '<br>Los necesitamos para enviarte los productos que ganes.';

    $queryNoti = "INSERT INTO tab_notificaciones (id_user,id_producto,fecha,tipo,titulo,mensaje,estado) 
    VALUES ('$id_user','',NOW(),'DAT','$tituloNoti','$mensajeNoti','A')";
    $resultNoti = mysqli_query($link,$queryNoti) or die(mysql_error());

    ?>
    <script type="text/javascript">location.href='mi-cuenta';</script> 
    <?php

}else{
    ?>
    <script type="text/javascript">location.href='iniciar-sesion';</script> 
    <?php
}
?>

  