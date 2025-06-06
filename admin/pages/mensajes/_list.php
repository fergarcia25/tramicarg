<?php 
$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

$tabla = 'tab_mensajes';
$id_tabla = 'id_mensajes';
?>

<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h4 class="font-weight-bold mb-0 py-3"><i class="ti-email pr-2"></i> Mensajes</h4>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-9 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Fecha</th>  
                <th>De</th>
                <th>E-mail</th>
                <th>Teléfono</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = querySQL_while("SELECT * FROM ".$tabla." ORDER BY fecha DESC");
              foreach ($sql as $key => $array) {
                if($sql != 'empty'){

                //fecha
                $date=date_create($array['fecha']);
                $fecha = date_format($date,"d/m/Y (h:m:s)");
                ?>
                <tr onclick="cargar('_edit','id=<?php echo $array[$id_tabla];?>');" <?php if(empty($array['visto'])) echo 'class="bg-mensajes"'; ?>>
                  <td><?php echo $fecha;?></td>  
                  <td><?php echo $array['nombre'].' '.$array['apellido'];?> </td>
                  <td><?php echo $array['email'];?></td>
                  <td><?php echo $array['telefono'];?></td>
                </tr>
              <?php }
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-title text-md-center text-xl-left">mensajes recibidos</p>
        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
          <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php total_count('mensajes');?></h3>
          <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
        </div>
        <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"><small>Total mensajes recibidos</small></span></p>
      </div>
    </div>
  </div>
