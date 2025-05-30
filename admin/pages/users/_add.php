
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h4 class="font-weight-bold mb-0">Nuevo usuario</h4>
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
        <h4 class="card-title">datos del nuevo usuario</h4>
        <form class="form-sample" id="form1" method="_POST" action="_save.php">
          <p class="card-description">
            Datos personales
          </p>
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
                <label class="col-sm-3 col-form-label">Apellido</label>
                <div class="col-sm-9">
                  <input type="text" name="apellido" class="form-control"/>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" name="email" class="form-control"/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Teléfono</label>
                <div class="col-sm-9">
                  <input type="tel" name="telefono" class="form-control"/>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            
          
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">DNI</label>
                <div class="col-sm-9">
                  <input type="text" name="dni" class="form-control"/>
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

          <hr>

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
                  <button type="submit" class="btn btn-primary">Guardar</button>
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
