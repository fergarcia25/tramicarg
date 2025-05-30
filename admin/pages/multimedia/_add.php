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
        <h4 class="font-weight-bold mb-0">Nuevo producto</h4>
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
      <div class="card-body">
        <h4 class="card-title">Crear nuevo producto</h4>
        <form class="form-sample" id="form1" method="_POST" action="_save.php">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group row">
                  <?php if($i == 'N'){ ?>
                    <a href="javascript:cargar('_add','i=Y');" style="position:absolute; background:rgba(255, 255, 255, 0.5); width:100%; height:327px; border:none; z-index:1000; padding: 30px 0;" class="text-center btn btn-primary"> </a>
                  <?php } ?>
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
                <label class="col-sm-2 col-form-label">Descripción</label>
                <div class="col-sm-10">
                  
                  <textarea name="descripcion"><?php echo $array['descripcion']; ?></textarea>
                  <script>
                    CKEDITOR.replace( 'descripcion' );
                    
                  </script>

                </div>
              </div>
            </div>
          </div>

          <hr><br>

          <p class="card-description">
            Valor del producto
          </p>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Creditos</label>
                <div class="col-sm-9">
                  <input type="text" name="creditos" class="form-control" />
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">% de ahorro</label>
                <div class="col-sm-9">
                  <input type="text" name="ahorro" class="form-control" />
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Precio de lista</label>
                <div class="col-sm-9">
                  <input type="text" name="precio_lista" class="form-control" />
                </div>
              </div>
            </div>
          </div>

          <p class="card-description">
            Rondas / Participantes
          </p>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Rondas</label>
                <div class="col-sm-9">
                  <select class="form-control" name="rondas" id="ron" onchange="d2(this)">
                    <option value="1">1 ronda</option>
                    <option value="2">2 rondas</option>
                    <option value="3">3 rondas</option>
                    <option value="4">4 rondas</option>
                    <option value="5">5 rondas</option>
                  </select>

                  <script language="javascript" type="text/javascript">
                    function d2(selectTag){

                      $("#load-rondas").load("_load_rondas.php?rondas="+selectTag.value);
                      $("#rondas").show();
                    }

                  </script>

                </div>
              </div>
            </div>
            <div class="col-md-6" id="rondas" style="display: none;">
              <div id="load-rondas"></div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Estado</label>
                <div class="col-sm-9">
                  <select class="form-control" name="estado">
                    <option value="I" selected>Inactivo</option>
                    <option value="A">Activo</option>
                    <option value="P">Próximamente</option>
                  </select>
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
                  <button type="submit" class="btn btn-primary">Guardar</button>
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
        <hr>
        <br><br>
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

