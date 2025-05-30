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
	$variable = str_replace ( "?" , "" , $variable);
	$variable = str_replace ( "%" , "" , $variable);
	$variable = str_replace ( "<" , "" , $variable);
	$variable = str_replace ( ">" , "" , $variable);
	
	return $GLOBALS[$name] = $variable;
}

function anti_hack_textarea($name, $variable){
	
	$variable = str_replace ( "/" , "" , $variable);
	$variable = str_replace ( "=" , "" , $variable);
	$variable = str_replace ( "'" , "" , $variable);
	$variable = str_replace ( "$" , "" , $variable);
	$variable = str_replace ( ";" , "." , $variable);
	$variable = str_replace ( "&" , "" , $variable);
	$variable = str_replace ( "#" , "" , $variable);
	$variable = str_replace ( "<" , "" , $variable);
	$variable = str_replace ( ">" , "" , $variable);

	
	return $GLOBALS[$name] = $variable;
}

function anti_hack_number($name, $variable){

	if($variable){
		if(!is_numeric($variable)){
			exit();
		}  
	}
}

function get_fecha($fecha){
	
	$fechaGet = date("d/m/Y - h:m:s", strtotime($fecha));
	return $fechaGet;
}



function querySQLIn($query){
	include('../config/connection.php');
	$sql = $query;
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);
	return $row;
}


function querySQL($query){
	include('config/connection.php');
	$sql = $query;
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);
	return $row;
}

function querySQL_while($query){
	require('config/connection.php');
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

function querySQL_whileIn($query){
	require('../config/connection.php');
	$sql = $query;
	$result = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($result)){
		$response[] = $row;
	}
	return $response;
}

function get_user($id,$valor){
	include('connection.php');
	$sql = "select * from tab_user where id_user = ".$id;
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);
	

	if($valor == 'nombreyapellido'){
		return($row['nombre'].' '.$row['apellido']);
	}else{
		return($row[$valor]);
	}
}
?>