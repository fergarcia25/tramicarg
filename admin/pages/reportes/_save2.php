<?php
$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');
/*
$tabla = 'tab_user';
$id_tabla = 'id_user';
*/
// seteo y limpieza de variables //


if(!empty($_POST['titulo'])){
	$titulo = anti_hack('titulo',$_POST['titulo']);
}else{
	$titulo = '';
}

if(!empty($_FILES["name"])){
	$name = $_FILES["name"];
	echo $name;
}else{
	$name = '';
}

if(!empty($_POST['tipo'])){
	$tipo = anti_hack('tipo',$_POST['tipo']);
}else{
	$tipo = '';
}

if(!empty($_POST['estado'])){
	$estado = anti_hack('estado',$_POST['estado']);
}else{
	$estado = '';
}

if(!empty($_POST['id'])){
	$id = anti_hack('id',$_POST['id']);
}else{
	$id = '';
}

?>

<!-- PROCESO DE CARGA Y PROCESAMIENTO DEL EXCEL-->
<?php 
extract($_POST);
if (isset($_POST['action'])) {
$action=$_POST['action'];
}

if (isset($action)== "upload"){
	//cargamos el fichero
	$archivo = $_FILES['excel']['name'];
	$tipo = $_FILES['excel']['type'];
	$destino = "cop_".$archivo;//Le agregamos un prefijo para identificarlo el archivo cargado
	if (copy($_FILES['excel']['tmp_name'],$destino)) echo "Archivo Cargado Con Éxito";
	else echo "Error Al Cargar el Archivo";
			
	if (file_exists ("cop_".$archivo)){ 
		/** Llamamos las clases necesarias PHPEcel */
		require_once('Classes/PHPExcel.php');
		require_once('Classes/PHPExcel/Reader/Excel2007.php');					
		// Cargando la hoja de excel
		$objReader = new PHPExcel_Reader_Excel2007();
		$objPHPExcel = $objReader->load("cop_".$archivo);
		$objFecha = new PHPExcel_Shared_Date();       
		// Asignamon la hoja de excel activa
		$objPHPExcel->setActiveSheetIndex(0);

		// Importante - conexión con la base de datos 


		// Rellenamos el arreglo con los datos  del archivo xlsx que ha sido subido

		$columnas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
		$filas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

		//Creamos un array con todos los datos del Excel importado
		for ($i=2;$i<=$filas;$i++){
								$_DATOS_EXCEL[$i]['nombres'] = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
								$_DATOS_EXCEL[$i]['apellidos'] = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
								$_DATOS_EXCEL[$i]['genero']= $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
								$_DATOS_EXCEL[$i]['carrera']= $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
								$_DATOS_EXCEL[$i]['edad'] = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
								$_DATOS_EXCEL[$i]['email'] = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
								$_DATOS_EXCEL[$i]['activo'] = 1;
							}		
							$errores=0;


		foreach($_DATOS_EXCEL as $campo => $valor){
								$sql = "INSERT INTO excel (nombres,apellidos,genero,carrera,edad,email,activo)  VALUES ('";
								foreach ($valor as $campo2 => $valor2){
									$campo2 == "activo" ? $sql.= $valor2."');" : $sql.= $valor2."','";
								}

								$result = mysqli_query($link, $sql);
								if (!$result){ echo "Error al insertar registro ".$campo;$errores+=1;}
							}	
							/////////////////////////////////////////////////////////////////////////	
		echo "<hr> <div class='col-xs-12'>
				<div class='form-group'>";
				echo "<strong><center>ARCHIVO IMPORTADO CON EXITO, EN TOTAL $campo REGISTROS Y $errores ERRORES</center></strong>";
		echo "</div>
		</div>  ";

		
		//Borramos el archivo que esta en el servidor con el prefijo cop_
		unlink($destino);
			
	}
	//si por algun motivo no cargo el archivo cop_ 
	else{
		echo "Primero debes cargar el archivo con extencion .xlsx";
	}
}


if($result){
	?>
	<script>location.href="reportes.php";</script>
	<?php
}
			
		?>