<?php 
$title='';
$url_dir='../../';
include('../header.php');
?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper" id="canvas">
    
  </div>
<!-- *div restante cierra en el footer -->
<!-- content-wrapper ends -->


<?php include('../footer.php'); ?>

<script type="text/javascript">
  
  function loadpage(){
    cargar('_edit','id=1');
  }

  window.onload = loadpage;
</script>
  