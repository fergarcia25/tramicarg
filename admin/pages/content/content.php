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
</div>

<!-- ADD CKeditor a este ABM -->
<script src="../../ckeditor/ckeditor.js"></script>

<script type="text/javascript">
  $( document ).ready(function() {
    cargar('_list','');
  });
</script>
  