function cargar(url,vars){
  $(document).ready(function(){
    $("#canvas").load(""+url+".php?"+vars);
  });
}


function cargarDiv(url,div){
  $("#"+div).load(""+url+".php");
}

function cargarDivFiles(div,url,id,page,idArticulo){
  $("#"+div).load(""+url+".php?id="+id+"&page="+page+"&idArticulo="+idArticulo);
}

function cargarFiles(div,id,vars){
  $(document).ready(function(){
    if(id){
      $("#"+div).load("_files.php?id="+id+"&"+vars);
    }
  });
}

function cargarFilesExterno(div,id,page){
  $(document).ready(function(){
      $("#"+div).load("../multimedia/_files_relation.php?id="+id+"&page="+page+"");
  });
}

function editFilesRelation(div,vars){
  $("#"+div).load("../multimedia/_edit_files_relation.php?"+vars);
}


function deleteFilesRelation(div,id,page,idArticulo){
  $("#"+div).load("../multimedia/_delete_files_relation.php?id="+id+"&page="+page+"&idArticulo="+idArticulo);
}

function deleteFiles(url,id,vars){
  $(document).ready(function(){
    if(id){
      $("#resultFiles").load("_delete_files.php?id="+id+"&"+vars);
    }
  });
}


function editar(url,id,vars){
  $(document).ready(function(){
    if(id){
      $("#canvas").load("_edit/"+url+".php?id="+id+"&"+vars);
    }
  });
}

function eliminar(url,id,vars,msj){
//  $("#btn_eliminar").easyconfirm();
  //$("#btn_eliminar").click(function() {
                    
  if(msj){
  confirmar=confirm(msj); 
  }else{
  confirmar=confirm("Los datos eliminados no podran recuperarse. Confirma eliminar? "); 
  }
  if (confirmar) {
                    
    if(id){
      $("#canvas").load("_delete.php?id="+id+"&"+vars);
    }

  }
}

function scrollToBox(id){
    $('html, body').animate({
        scrollTop: $("#box"+id).offset().top
    }, 2000);
}

function addbot(id_user,id){
  $(document).ready(function(){
    if(id){
      $("#canvas").load("_add_bot.php?id="+id+"&id_user="+id_user);
    }
  });
}
