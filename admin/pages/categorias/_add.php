<?php
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
        <h4 class="font-weight-bold mb-0"><i class="ti-layers pr-2"></i> Nueva categoría</h4>
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
  <div class="col-md-8 grid-margin">
    <div class="card">
      <?php
      //tapa temporal para recargar ckeditor sin error
      if($tapa == 'Y'){ ?>
        <a href="javascript:cargar('_add','tapa=N');" style="position:absolute; background:rgba(255, 255, 255, 0.3); border:none; width:100%; height:100%; z-index:1000; padding: 0;" class="text-center btn btn-primary"></a>
      <?php } 
      //fin tapa 
      ?>
      <div class="card-body">
        <h4 class="card-title">datos de la nueva categoría</h4>
        <form class="form-sample" id="form1" method="_POST" action="_save.php">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-9">
                  <input type="text" name="nombre" class="form-control"/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Estado</label>
                <div class="col-sm-9">
                  <select class="form-control" name="estado">
                    <option value="A">Activo</option>
                    <option value="I">Inactivo</option>
                    <option value="P">Pendiente</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group row">
                <label class="col-sm-12 col-form-label">Descripción</label>
                <div class="col-sm-12">
                  <script>
                      CKEDITOR.replace( 'descripcion' );
                  </script>

                  <textarea name="descripcion"></textarea>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group row">
                <div class="col-sm-12 text-right">
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
