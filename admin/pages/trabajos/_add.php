<?php
$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

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
?>

<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h4 class="font-weight-bold mb-0"><i class="ti-briefcase pr-2"></i> Nuevo trabajo</h4>
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
  <div class="col-md-8">
    <div class="card">
      <?php
      //tapa temporal para recargar ckeditor sin error
      if($tapa == 'Y'){ ?>
        <a href="javascript:cargar('_add','tapa=N');" style="position:absolute; background:rgba(255, 255, 255, 0.3); border:none; width:100%; height:100%; z-index:1000; padding: 0;" class="text-center btn btn-primary"></a>
      <?php } 
      //fin tapa 
      ?>
      <div class="card-body">
        <h4 class="card-title">Crear nuevo producto</h4>
        <form class="form-sample" id="form1" method="_POST" action="_save.php">
          <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                <label class="col-sm-2 col-form-label">Título</label>
                <div class="col-sm-10">
                  <input type="text" name="titulo" class="form-control" />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Descripción breve</label>
                <div class="col-sm-10">
                  <input type="text" name="description" class="form-control" value="" />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Categoría</label>
                <div class="col-sm-10">
                  <select class="form-control" name="categ">
                    <?php
                    $sql = querySQL_while("SELECT * FROM tab_categ ORDER BY nombre ASC");
                    foreach ($sql as $key => $arrayP) {
                    ?>
                    <option value="<?php echo $arrayP['id_categ'];?>"><?php echo ($arrayP['nombre']);?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-10">
                  <select class="form-control" name="estado">
                    <option value="I" selected>Inactivo</option>
                    <option value="A">Activo</option>
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
                  
                  <textarea name="contenido"></textarea>
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
                <div class="col-sm-12 text-right">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>



  <div class="col-md-3 grid-margin">
    
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

