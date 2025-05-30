<?php
function anti_hack($name, $variable){
	
	$variable = str_replace ( ")" , "" , $variable);
	$variable = str_replace ( "(" , "" , $variable);
	$variable = str_replace ( "/" , "" , $variable);
	$variable = str_replace ( "=" , "" , $variable);
	$variable = str_replace ( "'" , "" , $variable);
	$variable = str_replace ( "$" , "" , $variable);
	$variable = str_replace ( ";" , "" , $variable);
	$variable = str_replace ( "&" , "" , $variable);
	$variable = str_replace ( "#" , "" , $variable);
	$variable = str_replace ( "%" , "" , $variable);
	$variable = str_replace ( "<" , "" , $variable);
	$variable = str_replace ( ">" , "" , $variable);
	
	return $GLOBALS[$name] = $variable;
}


function anti_hack_textarea($name, $variable){
	
	$variable = str_replace ( ")" , "" , $variable);
	$variable = str_replace ( "(" , "" , $variable);
	$variable = str_replace ( "/" , "" , $variable);
	$variable = str_replace ( "=" , "" , $variable);
	$variable = str_replace ( "'" , "" , $variable);
	$variable = str_replace ( "$" , "" , $variable);
	$variable = str_replace ( ";" , "." , $variable);
	$variable = str_replace ( "&" , "" , $variable);
	$variable = str_replace ( "#" , "" , $variable);
	$variable = str_replace ( "%" , "" , $variable);
	
	return $GLOBALS[$name] = $variable;
}

function anti_hack_number($name, $variable){

	if($variable){
		if(!is_numeric($variable)){
			exit();
		}  
	}
}

function querySQL($query){
	include('../../config/connection.php');
	$sql = $query;
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);
	return $row;
}

function querySQL_while($query){
	require('../../config/connection.php');
	$sql = $query;
	$result = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($result)){
		$response[] = $row;
	}
	if(!empty($response)){
		return $response;
	}else{
		return 'empty';
	}
}


function get_sigla($valor,$var){

	switch ($var) {
			
		case 'plan':
			
			switch ($valor) {
				
				case 'FRE':
					return "Free";
					break;
				case 'PRE':
					return "Premium";
					break;
				case 'PLA':
					return "Platino";
					break;
			}
			break;

		case 'estado':
		
			switch ($valor) {		

				case 'A':
					return "Activo";
					break;
				case 'I':
					return "Inactivo";
					break;
				case 'P':
					return "Pendiente";
					break;
			}
			break;

		case 'estado_productos':
		
			switch ($valor) {		

				case 'A':
					return "Activo";
					break;
				case 'I':
					return "Inactivo";
					break;
				case 'P':
					return "Proximamente";
					break;
				case 'F':
					return "Finalizado";
					break;
				case 'E':
					return "En curso";
					break;
				case '1':
					return "1º Ronda";
					break;
				case '2':
					return "2º Ronda";
					break;
				case '3':
					return "3º Ronda";
					break;
				case '4':
					return "4º Ronda";
					break;
			}
			break;

		case 'estado_trabajos':
		
			switch ($valor) {		

				case 'A':
					return "Activo";
					break;
				case 'I':
					return "Inactivo";
					break;
			}
			break;

		case 'estado_sorteos':
		
			switch ($valor) {		

				case 'A':
					return "A";
					break;
				case '1':
					return "Ganador";
					break;
				case 'E':
					return "E";
					break;
			}
			break;
	}
}


function total_count($var){
	$varID= 'id_'.$var;
	$varTable= 'tab_'.$var;
	include('../../config/connection.php');
	$sql = 'SELECT COUNT('.$varID.') as total FROM '.$varTable.'';
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);
	echo $row['total'];
}

function total_reportes($var){
	$varID= 'id';
	$varTable= 'tab_'.$var;
	include('../../config/connection.php');
	$sql = 'SELECT COUNT('.$varID.') as total FROM '.$varTable.'';
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);
	echo $row['total'];
}

function total_user($var,$tipo,$plan){
	$varID= 'id_'.$var;
	$varTable= 'tab_'.$var;
	include('../../config/connection.php');
	$sql = 'SELECT COUNT('.$varID.') as total FROM '.$varTable.' where tipo = "'.$tipo.'"';
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);
	echo $row['total'];
}


function total_count_sub($var,$c){
	$varID= 'id_'.$var;
	$varTable= 'tab_'.$var;
	include('../../config/connection.php');
	$sql = 'SELECT COUNT('.$varID.') as total FROM '.$varTable.' WHERE categ = '.$c;
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);
	echo $row['total'];
}

function total_mensajes_no_leidos(){
	$varID= 'id_mensajes';
	$varTable= 'tab_mensajes';
	include('../../config/connection.php');
	$sql = 'SELECT COUNT('.$varID.') as total FROM '.$varTable.' WHERE visto = ""';
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);
	echo $row['total'];
}


function get_user($id,$valor){
	include('../../config/connection.php');
	$sql = "select * from tab_user where id_user = ".$id;
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);
	

	if($valor == 'nombreyapellido'){
		return($row['nombre'].' '.$row['apellido']);
	}else{
		return($row[$valor]);
	}
}

function get_paquete($id,$valor){
	include('../../config/connection.php');
	$sql = "select * from tab_paquetes where id_paquetes = ".$id;
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);
	
	return($row[$valor]);
}


function get_rubro($id){
	include('../../config/connection.php');
	$sql = "select * from tab_rubros where id_rubros = ".$id;
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);

	return $row['nombre'];
}

function get_categ($id){
	include('../../config/connection.php');
	$sql = "select * from tab_categ where id_categ = ".$id;
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);

	return($row['nombre']);
}

function check_rubro($id,$rubro){
	include('../../config/connection.php');
	$sql = "select * from tab_profesionales_rubros where id_profesionales = ".$id." and id_rubros = ".$rubro;
	$result = mysqli_query($link,$sql);
	if($row = mysqli_fetch_array($result)){
		return "checked='checked'";
	}else{
		return "";
	}
	
}

?>