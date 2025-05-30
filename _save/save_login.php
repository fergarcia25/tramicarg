<?php
include ("../config/connection.php");
include ("../config/functions.php");

if(!empty($_POST['email'])){
	$email = ($_POST['email']);
}else{
	$email = '';
}

if(!empty($_POST['password'])){
	$password = ($_POST['password']);
}else{
	$password = '';
}


$error = 'N';
$mens='';

	if(!empty($email) && !empty($password)){
		$email = anti_hack('email',$_POST['email']);
		$password = md5(anti_hack('password',$_POST['password']));
		
		$row = querySQLIn("select * from tab_user where email = '".$email."'");

		
			if($row["password"] == $password){
				$log = 'Y';
				/*
				$queryLog = "INSERT INTO tab_logs (fecha,accion,id_user,ip) VALUES (NOW(),'I','".$row["id_user"]."','')";
				$resultLog = mysqli_query($link,$queryLog) or die(mysqli_error());
				*/
				session_start();
				$_SESSION['id_user'] = $row["id_user"];
				$_SESSION['name_user'] = $row["nombre"];
				?>
                <script>location.href='panel.php';</script>
                <?php
			}
			
			
		if(empty($log)){
			$error = 'Y';
			$mens = '<span class="alert-error">El email o la contraseña son incorrectos. <br> Inventa nuevamente</span>';
		}

	}else{ 
		$error = 'Y';
		$mens = '<span class="alert-error">* Ingresa tus datos correctamente</span>';
	}


// mostrar mensaje
if(!empty($mens)){ ?>
	<div class="alert danger"><?php echo $mens; ?></div>
<?php
}
?>