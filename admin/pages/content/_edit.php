<?php 
if(!empty($_GET['id'])){
  $id = $_GET['id'];
}else{
  return false;
  exit();
}

if(!empty($_GET['i'])){
  $i = $_GET['i'];
}else{
  $i = 'N';
}

if(!empty($_GET['tapa'])){
  $tapa = $_GET['tapa'];
}else{
  $tapa = 'Y';
}

$page = 'content';

$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

$array = querySQL("SELECT * FROM tab_content WHERE id_content = $id");

//color box estado
if($array['estado'] == 'A') $okestado='success';
elseif($array['estado'] == 'I') $okestado = 'danger';
elseif($array['estado'] == 'P') $okestado = 'warning'; 

?>

<link rel="stylesheet" href="../../css/jquery.fileupload.css">

<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h4 class="font-weight-bold mb-0"><i class="ti-files pr-2"></i> Páginas / Bloques > <?php echo $array['titulo'];?></h4>
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
          <div class="row">
            <div class="col-md-12">
            <p class="small">Selecciona las imagenes que quieras agregar a este artículo</p>
            <a class="btn btn-primary btn-sm" href="javascript:lib_view();">Ver libreria multimedia</a>
            <a class="btn btn-secondary btn-sm" href="javascript:lib_hide();">Ocultar</a>
            <div id="filesAdd"></div>
            </div>
          </div>
          <script>
            function lib_view(){
              cargarFilesExterno('filesAdd',<?php echo $id;?>,'<?php echo $page;?>');
              $('#filesAdd').show();
            }
            function lib_hide(){
              $('#filesAdd').hide();
            }
          </script>
      </div>
    </div>
  </div>
 
 
  <div class="col-md-8 grid-margin">
    <div class="card">
      <?php
      //tapa temporal para recargar ckeditor sin error
      if($tapa == 'Y'){ ?>
        <a href="javascript:cargar('_edit','id=<?php echo $array['id_content'];?>&tapa=N');" style="position:absolute; background:rgba(255, 255, 255, 0.3); border:none; width:100%; height:100%; z-index:1000; padding: 0;" class="text-center btn btn-primary"></a>
      <?php } 
      //fin tapa 
      ?>
      <div class="card-body">
        <h4 class="card-title">Modificar contenido</h4>
        <form class="form-sample" id="form1" method="_POST" action="_save.php">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Título</label>
                <div class="col-sm-10">
                  <input type="text" name="titulo" class="form-control" value="<?php echo $array['titulo']; ?>" />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Descripción breve</label>
                <div class="col-sm-10">
                  <input type="text" name="description" class="form-control" value="<?php echo $array['description']; ?>" />
                </div>
              </div>
            </div>
          </div>
          <!--
          <div class="row">
            <div class="col-md-12">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Palabras Claves</label>
                <div class="col-sm-10">
                  <input type="text" name="keywords" class="form-control" value="<?php echo $array['keywords']; ?>" />
                </div>
              </div>
            </div>
          </div>
          -->
          <div class="row">
            <div class="col-md-12">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-10">
                  <select class="form-control" name="estado">
                    <option value="A" <?php if($array['estado'] == 'A') echo 'selected="selected"'; ?>>Activo</option>
                    <option value="I" <?php if($array['estado'] == 'I') echo 'selected="selected"'; ?>>Inactivo</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Contenido</label>
                <div class="col-sm-10">
                  <textarea name="contenido"><?php echo $array['contenido']; ?></textarea>
                  <script>
                          CKEDITOR.replace( 'contenido' );
                  </script>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group row">
                <div class="col-sm-8">
                </div>
                <div class="col-sm-4">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <button type="submit" class="btn btn-primary float-right">Guardar cambios</button>
                </div>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

  <div class="col-md-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><i class="ti-image icon-tiny"></i> MULTIMEDIA</h4>
          <div class="large-12 left">
              <div id="files_relation_pages_saved"></div>
              <div id="files_relation_pages"></div>
              <div id="resultFiles" class="left"></div>
          </div>
          <script>
              cargarDivFiles('files_relation_pages','../multimedia/_files_relation_pages','<?php echo $id;?>','<?php echo $page;?>','<?php echo $id;?>');
          </script>        
          
        <!-- FIN imagenes -->
      </div>
    </div>
    <br>
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><i class="ti-target icon-tiny"></i> Acciones</h4>
        <a href="#" class="btn btn-danger btn-sm" onclick="eliminar('_delete','<?php echo $id;?>');"><i class="ti-trash icon-tiny"></i> Eliminar página / bloque</a>
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
}); 
</script>

