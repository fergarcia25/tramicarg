
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h4 class="font-weight-bold mb-0">Nuevo excel</h4>
      </div>
      <div>
          <button type="button" class="btn btn-light btn-icon-text btn-rounded" onclick="cargar('_list','');">
            <i class="ti-close btn-icon-prepend"></i>Volver
          </button>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">datos del nuevo excel</h4>

                  
          <form name="import" method="post" action="_save.php" enctype="multipart/form-data" >
            <div class="col-xs-4">
              <div class="form-group">
                <input type="file" class="form-input" data-buttonText="Seleccione archivo" name="excel">
              </div>
            </div>
            <div class="col-xs-2 col-md-12 text-right">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
            <input type="hidden" value="upload" name="action" />
            <input type="hidden" value="usuarios" name="mod">
            <input type="hidden" value="masiva" name="acc">
          </form>


      </div>
    </div>
  </div>

<script>
  /*
$(document).ready(function(){
          
    $('#form1').submit(function(){
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            contentType: 'multipart/form-data',
            success: function(data) {
                $('#canvas').html(data);
                alert(data);
            }
        })
    
        return false;
    }); 
}); 
*/
</script>
