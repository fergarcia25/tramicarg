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

$page = 'multimedia';

$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

$array = querySQL("SELECT * FROM tab_galerias WHERE id_galerias = $id");
//color box estado
if($array['estado'] == 'A') $okestado='success';
elseif($array['estado'] == 'I') $okestado = 'danger';
elseif($array['estado'] == 'P') $okestado = 'warning'; 

?>

<!-- ADD CKeditor a este ABM -->
<div class="row">
 
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><i class="ti-image icon-tiny"></i> MULTIMEDIA</h4>
        <hr>
        <!-- imagenes -->
              
          <link rel="stylesheet" href="../../css/jquery.fileupload.css">
          
          <div>
              <!-- The fileinput-button span is used to style the file input field as button -->
              <span class="btn btn-primary fileinput-button  btn-sm btn-icon-text">
                  <i class="glyphicon glyphicon-plus"></i>
                  <span><i class="ti-upload btn-icon-prepend"></i> Subir imagenes</span>
                  <!-- The file input field used as target for the file upload widget -->
                  <input class="form-control" id="fileupload" type="file" name="files[]" multiple  accept=".png,.jpg,.jpeg,.gif">
              </span>
              <br>
              <br>
              <!-- The global progress bar -->
              <div id="progress" class="progress">
                  <div class="progress-bar progress-bar-success"></div>
              </div>
          </div>
          
          <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
          <script src="../../js/vendor/jquery.ui.widget.js"></script>
          <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->

          <!-- The basic File Upload plugin -->
          <script src="../../js/jquery.fileupload.js"></script>
          <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
          <script>
          /*jslint unparam: true */
          /*global window, $ */

              // Change this to the location of your server-side upload handler:
              var url = '../../files/';
              $('#fileupload').fileupload({
                  url: url,
                  dataType: 'json',
                  progressall: function (e, data) {
                      var progress = parseInt(data.loaded / data.total * 100, 10);
                      $('#progress .progress-bar').css(
                          'width',
                          progress + '%'
                      );
                      $( "#carga-exitosa" ).removeClass( "d-none" );
                      cargarFiles('files',<?php echo $id;?>,'');
                  }
              });

          </script>
          <div id="carga-exitosa" class="small d-none"><br><strong> Imagenes cargadas correctamente</strong></div>
          
          <div class="large-12 left">
              <div id="files">
              </div>
              <div id="resultFiles" class="left"></div>
          </div>
          <script>
              cargarFiles('files',<?php echo $id;?>,'');
          </script>        
          
        <!-- FIN imagenes -->
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

    ron=document.getElementById('ron').value;
    if(ron != '0'){
      $("#load-rondas").load("_load_rondas.php?rondas="+ron+"&id=<?php echo $id; ?>");
      $("#rondas").show();
    }
}); 
</script>

