<?php
include('../../config/connection.php');
include('../../config/functions.php');
$tabla = 'tab_productos';
$id_tabla = 'id_productos';


// seteo y limpieza de variables //


if(!empty($_GET['rondas'])){
  $rondas = ($_GET['rondas']);
}else{
  $rondas = '';
}

if(!empty($_GET['id'])){
  $id = ($_GET['id']);
  $arrayRu = querySQL("SELECT * FROM ".$tabla." WHERE ".$id_tabla." = $id");
}else{
  $id = '';
}


if(!empty($rondas)){

  if($rondas == 'L'){

    ?>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Tiempo</label>
      <div class="col-sm-10">
        <select class="form-control" name="tiempo">
          <option value="A">Tiempo de subasta</option>
          <?php for($i=1;$i<=72;$i++){ ?>
          <option value="<?php echo $i;?>"><?php echo $i;?> hs</option>
          <?php } ?>
        </select>
      </div>
    </div>


    <?php

  }else{

    for($i=1;$i<=$rondas;$i++){
      if(!empty($id)){
        $valor = $arrayRu['ronda'.$i];
      }else{
        $valor = '';
      }
    ?>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Ronda <?php echo $i;?></label>
      <div class="col-sm-9">
        <input type="text" name="ronda<?php echo $i;?>" value="<?php echo $valor; ?>" placeholder="Cant. participantes" class="form-control" />
      </div>
    </div>

    <?php
    }
  }

}

?>

