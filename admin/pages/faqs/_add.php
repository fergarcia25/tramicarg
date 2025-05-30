<?php
if(!empty($_GET['i'])){
  $i = $_GET['i'];
}else{
  $i = 'N';
}
?>
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h4 class="font-weight-bold mb-0">Nueva pregunta</h4>
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
        <h4 class="card-title">datos de la pregunta</h4>
        <form class="form-sample" id="form1" method="_POST" action="_save.php">
          <div class="row">
            <?php if($i == 'N'){ ?>
              <a href="javascript:cargar('_add','i=Y');" style="position:absolute; background:rgba(255, 255, 255, 0.5); width:100%; height:330px; border:none; z-index:1000; padding: 30px 0;" class="text-center btn btn-primary"> </a>
            <?php } ?>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Pregunta</label>
                <div class="col-sm-9">
                  <input type="text" name="titulo" class="form-control"/>
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
