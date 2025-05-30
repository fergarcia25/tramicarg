<?php 
if(!empty($_GET['id'])){
  $id = $_GET['id'];
}else{
  return false;
  exit();
}

$tabla = 'tab_mensajes';
$id_tabla = 'id_mensajes';

$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

$array = querySQL("SELECT * FROM ".$tabla." WHERE ".$id_tabla." = $id");

//fecha de registro
$date=date_create($array['fecha']);
$fecha = date_format($date,"d/m/Y (h:m:s)");
?>

<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h4 class="font-weight-bold mb-0"><i class="ti-email pr-2"></i> Mensaje > <?php echo $array['nombre'].' '.$array['apellido'];?></h4>
      </div>
      <div>
          <button type="button" class="btn btn-light btn-icon-text btn-rounded" onclick="cargar('_list','');">
            <i class="ti-close"></i>
          </button>
      </div>
    </div>
  </div>
</div>



<div class="row">

  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><i class="ti-user icon-tiny pr-2"></i> <?php echo $array['nombre'].' '.$array['apellido'];?></h4>
        <hr>
        <p><?php echo $array['mensaje'];?></p>
        <hr>
        <p><i class="ti-timer pr-2"></i> <?php echo $fecha;?></p>
        <p><i class="ti-email pr-2"></i> <?php echo $array['email'];?></p>
        <p><i class="ti-headphone-alt pr-2"></i> <?php echo $array['telefono'];?></p>
        <hr>
        <a href="#" class="btn btn-success btn-sm" onclick="cargar('_visto','id=<?php echo $id;?>');"><i class="ti-check pr-2"></i>Visto</a>
        <a href="mailto:<?php echo $array['email'];?>" class="btn btn-primary btn-sm"><i class="ti-new-window pr-2"></i> Respoder</a>
        <a href="#" class="btn btn-danger btn-sm float-right" onclick="eliminar('_delete','<?php echo $id;?>');"><i class="ti-trash"></i></a>
      </div>
    </div>
    <div class="">
      <div class="card-body">
        
      </div>
    </div>
  </div>
</div>


