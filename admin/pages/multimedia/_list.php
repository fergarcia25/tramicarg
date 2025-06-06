<?php 
$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');
?>

<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h4 class="font-weight-bold mb-0">Productos</h4>
      </div>
      <div>
          <button type="button" class="btn btn-primary btn-icon-text btn-rounded" onclick="cargar('_add','');">
            <i class="ti-plus btn-icon-prepend"></i>Nuevo producto
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
                <th>Fecha</th>
                <th>Título</th>
                <th>Participando</th>
                <th>Entrada</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = querySQL_while("SELECT * FROM tab_productos WHERE id_productos != '' ORDER BY estado ASC, fecha DESC");
                foreach ($sql as $key => $array) {

                //ultima modificacion
                $date=date_create($array['fecha']);
                $fecha = date_format($date,"d/m/Y");

                ?>
              <tr onclick="cargar('_edit','id=<?php echo $array['id_productos'];?>');">
                <td><?php echo $fecha;?></td>
                <td><?php echo $array['titulo'];?></td>
                <td><?php echo total_jugadores($array['id_productos']);?> / <?php echo $array['ronda1'];?></td>
                <td><i class="ti-server" style="color: #EFB810;"> </i> <?php echo $array['creditos'];?></td>
                
                <?php 
                if($array['estado'] == 'A' || $array['estado'] == 'E') $okestado='success';
                elseif($array['estado'] == 'I') $okestado = 'danger';
                elseif($array['estado'] == 'F') $okestado = 'secondary';
                elseif($array['estado'] == 'P') $okestado = 'primary';
                ?>
                <td><label class="badge badge-<?php echo $okestado;?>"><?php echo get_sigla($array['estado'],'estado_productos');?></label></td>
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
        <p class="card-title text-md-center text-xl-left">Total productos</p>
        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
          <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php total_count('productos');?></h3>
          <i class="ti-write icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
        </div>
        <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"><small>productos creados</small></span></p>
      </div>
    </div>
  </div>