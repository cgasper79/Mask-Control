<?php	
	include ('../includes/conexion.php');

	$email = $_POST[ "email" ];
	$password = md5( $_POST[ "password" ] );
	$sql = "SELECT * FROM usuario WHERE email LIKE '{$email}' AND password LIKE '%{$password}%'";
	$result = mysqli_query( $conexion, $sql );

	if( mysqli_num_rows( $result ) ){
		session_start();
		$_SESSION[ "email" ] = $email;
		header( "Location: ../index.php" );
	}else{
		echo ("Usuario no encontrado");
		header( "Location: login.php" );
	}
?>