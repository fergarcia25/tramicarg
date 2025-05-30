<?php 
$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

?>

<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h4 class="font-weight-bold mb-0">Usuarios</h4>
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
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre y Apellido</th>
                <th>E-mail</th>
                <th>Teléfono</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = querySQL_while("SELECT * FROM tab_user ORDER BY fecha_registro DESC");
                foreach ($sql as $key => $array) {
                ?>
                
              <tr onclick="cargar('_edit','id=<?php echo $array['id_user'];?>');">
                <td><?php echo $array['id_user'];?></td>  
                <td><?php echo $array['nombre'].' '.$array['apellido'];?></td>
                <td><?php echo $array['email'];?></td>
                <td><?php echo $array['telefono'];?></td>
                <?php 
                if($array['estado'] == 'A') $okestado='success';
                elseif($array['estado'] == 'I') $okestado = 'danger';
                elseif($array['estado'] == 'P') $okestado = 'warning'; 
                ?>
                <td><label class="badge badge-<?php echo $okestado;?>"><?php echo get_sigla($array['estado'],'estado');?></label></td>
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
        <p class="card-title text-md-center text-xl-left">Total usuarios</p>
        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
          <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php total_count('user');?></h3>
          <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
        </div>
        <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"><small>Usuarios registrados</small></span></p>
      </div>
    </div>
  </div>
