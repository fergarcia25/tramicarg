<?php 
$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

?>

<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h4 class="font-weight-bold mb-0">Reportes (excel)</h4>
      </div>
      <div>
          <button type="button" class="btn btn-primary btn-icon-text btn-rounded" onclick="cargar('_add','');">
            <i class="ti-plus btn-icon-prepend"></i>Nuevo
          </button>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-9 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>ID Usuario</th>
                <th>Nombre</th>
                <th>Acciones</th>
                <th>Val. Cuotaparte</th>
                <th>Fecha</th>
                <th>Total Invertido</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = querySQL_while("SELECT * FROM tab_reportes ORDER BY id ASC");
                foreach ($sql as $key => $array) {
                ?>
                
              <tr>
                <td><?php echo $array['id_user'];?></td>
                <td><?php echo $array['nombre'];?></td>
                <td><?php echo $array['acciones'];?></td>
                <td><?php echo $array['valor_cuotaparte'];?></td>
                <td><?php echo $array['fecha'];?></td>
                <td><?php echo $array['total_invertido'];?></td>                
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-title text-md-center text-xl-left">Total de Reportes</p>
        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
          <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php total_reportes('reportes');?></h3>
          <i class="ti-bar-chart-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
        </div>
        <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"><small>Reportes subidos</small></span></p>
      </div>
    </div>
  </div>
