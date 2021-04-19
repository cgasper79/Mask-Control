<?php	
	include ('./conexion.php');
    
	$email = mysqli_real_escape_string($conexion,$_POST[ "email" ]);
	$password = mysqli_real_escape_string($conexion,$_POST[ "password" ]);
	$password_md5 = md5( $password);
	$sql = "SELECT * FROM usuario WHERE email LIKE '{$email}' AND password LIKE '%{$password_md5}%'";
	$result = mysqli_query( $conexion, $sql );

	if( mysqli_num_rows( $result ) ){
		//session_start();
		$_SESSION[ "email" ] = $email;
		header( "Location: ./index.php" );
	}else{
		echo ("Usuario no encontrado");
		header( "Location: login.php" );
	}
?>