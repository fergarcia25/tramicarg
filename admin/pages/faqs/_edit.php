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

$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

$array = querySQL("SELECT * FROM tab_faqs WHERE id_faqs = $id");

//color box estado
if($array['estado'] == 'A') $okestado='success';
elseif($array['estado'] == 'I') $okestado = 'danger';
elseif($array['estado'] == 'P') $okestado = 'warning'; 

?>

<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h4 class="font-weight-bold mb-0">Detalle de pregunta</h4>
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




  <div class="col-md-9 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Modificar datos de la pregunta</h4>
        <form class="form-sample" id="form1" method="_POST" action="_save.php">
          <div class="row">
            <?php if($i == 'N'){ ?>
              <a href="javascript:cargar('_edit','id=<?php echo $array['id_faqs'];?>&i=Y');" style="position:absolute; background:rgba(255, 255, 255, 0.5); width:100%; height:330px; border:none; z-index:1000; padding: 30px 0;" class="text-center btn btn-primary"> </a>
            <?php } ?>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Pregunta</label>
                <div class="col-sm-9">
                  <input type="text" name="titulo" class="form-control" value="<?php echo $array['titulo']; ?>" />
                </div>
              </div>
            </div>
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
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Respuesta</label>
                <div class="col-sm-10">
                  <textarea name="respuesta"><?php echo $array['respuesta']; ?></textarea>
                  <script>
                          CKEDITOR.replace( 'respuesta' );
                  </script>
                </div>
              </div>
            </div>
          </div>
          
          
          <div class="row">
            <div class="col-md-12">
              <div class="form-group row">
                <div class="col-sm-9">
                </div>
                <div class="col-sm-3">
                  <input type="hidden" name="c" value="<?php echo $c; ?>">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <button type="submit" class="btn btn-primary">Actualizar datos</button>
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
}); 
</script>


  <div class="col-md-3 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-title text-md-center text-xl-left">Total faqs</p>
        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
          <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php total_count('faqs');?></h3>
          <i class="ti-palette icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
        </div>
        <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"><small>Preguntas guardadas</small></span></p>
        <br>
        <a href="#" class="btn btn-danger btn-sm" onclick="eliminar('_delete','<?php echo $id;?>');">Eliminar pregunta</a>
      </div>
    </div>
  </div>
