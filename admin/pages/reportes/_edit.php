<?php 
if(!empty($_GET['id'])){
  $id = $_GET['id'];
}else{
  return false;
  exit();
}

$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

$array = querySQL("SELECT * FROM tab_user WHERE id_user = $id");

//fecha de registro
$date=date_create($array['fecha_registro']);
$fecha_registro = date_format($date,"d/m/Y");

//color box estado
if($array['estado'] == 'A') $okestado='success';
elseif($array['estado'] == 'I') $okestado = 'danger';
elseif($array['estado'] == 'P') $okestado = 'warning'; 

?>

<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h4 class="font-weight-bold mb-0">Detalle de usuario</h4>
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

  <div class="col-md-3 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><i class="ti-user icon-tiny"></i> <?php echo $array['nombre'];?></h4>
        <hr>
        <p><label class="badge badge-<?php echo $okestado;?>"><?php echo get_sigla($array['estado'],'estado');?></label></p>
        <p><label class="badge badge-primary">ALTA <?php echo $fecha_registro;?></label></p>
        <hr>
        <p><i class="ti-email mx-0"></i> <?php echo $array['email'];?></p>
        <p><i class="ti-headphone-alt mx-0"></i> <?php echo $array['telefono'];?></p>
        <hr>
        <a href="#" class="btn btn-danger btn-sm" onclick="eliminar('_delete','<?php echo $id;?>');">Eliminar usuario</a>
      </div>
    </div>
    <div class="">
      <div class="card-body">
        
      </div>
    </div>
  </div>

  <div class="col-md-9 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Modificar datos del usuario</h4>
        <form class="form-sample" id="form1" method="_POST" action="_save.php">
          <p class="card-description">
            Datos personales
          </p>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-9">
                  <input type="text" name="nombre" class="form-control" value="<?php echo $array['nombre']; ?>" />
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Apellido</label>
                <div class="col-sm-9">
                  <input type="text" name="apellido" class="form-control" value="<?php echo $array['apellido']; ?>" />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="text" name="email" class="form-control" value="<?php echo $array['email']; ?>" />
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Teléfono</label>
                <div class="col-sm-9">
                  <input type="text" name="telefono" class="form-control" value="<?php echo $array['telefono']; ?>" />
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Estado</label>
                <div class="col-sm-9">
                  <select class="form-control" name="estado">
                    <option value="A" <?php if($array['estado'] == 'A') echo 'selected="selected"'; ?>>Activo</option>
                    <option value="I" <?php if($array['estado'] == 'I') echo 'selected="selected"'; ?>>Inactivo</option>
                    <option value="P" <?php if($array['estado'] == 'P') echo 'selected="selected"'; ?>>Pendiente</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tipo</label>
                <div class="col-sm-9">
                  <select class="form-control" name="tipo">
                    <option value="R" <?php if($array['tipo'] == 'R') echo 'selected="selected"'; ?>>Real</option>
                    <option value="B" <?php if($array['tipo'] == 'B') echo 'selected="selected"'; ?>>Bot</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
<!--
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Creditos</label>
                <div class="col-sm-9">
                  <input type="text" name="creditos" class="form-control" value="<?php echo $array['creditos']; ?>" />
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Puntos</label>
                <div class="col-sm-9">
                  <input type="text" name="puntos" class="form-control" value="<?php echo $array['puntos']; ?>" />
                </div>
              </div>
            </div>
          </div>


          <p class="card-description">
            Ubicación
          </p>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Provincia</label>
                <div class="col-sm-9">
                  <select class="form-control" name="provincia" id="prov" onchange="d2(this)">
                    <option value="0">Provincia</option>
                    <?php
                    $sql = querySQL_while("SELECT * FROM tab_provincias ORDER BY provincia DESC");
                    foreach ($sql as $key => $arrayP) {
                    ?>
                    <option value="<?php echo $arrayP['id_provincia'];?>" <?php if($array['provincia'] == $arrayP['id_provincia']) echo 'selected="selected"'; ?>><?php echo ($arrayP['provincia']);?></option>
                    <?php } ?>
                  </select>
                  <script language="javascript" type="text/javascript">
                    function d2(selectTag){

                      $("#load-localidades").load("_load_localidades.php?idP="+selectTag.value);
                      $("#localidad").show();
                    }

                  </script>


                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row" id="localidad" style="display: none;">
                <label class="col-sm-3 col-form-label">Localidad</label>
                <div class="col-sm-9">
                  <div id="load-localidades"></div>
                </div>
              </div>
            </div>
          </div>
-->
          
          <p class="card-description">
            Dirección
          </p>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Calle</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="calle" value="<?php echo $array['calle']; ?>" />
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Altura / dpto</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="altura" value="<?php echo $array['altura']; ?>" />
                </div>
              </div>
            </div>
          </div>

          
          <p class="card-description">
            Contraseña
          </p>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nueva</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" name="password" />
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Confirmar</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" name="password2" />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group row">
                <div class="col-sm-9">
                </div>
                <div class="col-sm-3 text-right">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

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
/*
  prov=document.getElementById('prov').value;
  if(prov != '0'){
    $("#load-localidades").load("_load_localidades.php?idP="+prov+"&loc=<?php echo $array['localidad']; ?>");
    $("#localidad").show();
  }
*/
}); 
</script>

