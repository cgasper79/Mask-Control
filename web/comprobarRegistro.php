<?php	
	include ('./conexion.php');

	$name = $_POST[ "name" ];
	$email = $_POST[ "email" ];
	$password = md5( $_POST[ "password" ] );
	$sql = "SELECT * FROM usuario WHERE email LIKE '{$email}'";
	$result = mysqli_query( $conexion, $sql );

	if( mysqli_num_rows( $result ) ){
		
		echo '<h1 align="center" class="error">¡Ya existe un usuario con este email!</h1>';
		echo '<h2 align="center" class="error">¡Serás redirigido en 5 segundos a la página de registro!</h2>';
		echo '<div align="center"> <a href="./registro.php"> <h2>Ves a Registro</a> </h2></div>';
		header("refresh:5;registro.php");
		
	}else{
		
		$sql2 = "INSERT INTO usuario
                (name, email, password) 
                VALUES ('$name' , '$email' , '$password' )";

        $insertar=mysqli_query($conexion,$sql2);
		echo 1;

		echo '<h1 align="center" class="success text-center">¡Te has registrado correctamente!</h1>';
		echo '<h2 align="center" class="error">¡Serás redirigido en 5 segundos a la página de login!</h2>';
		echo '<div align="center"> <a href="./login.php"> <h2>Ves a Iniciar Sesión</a> </h2></div>';
		header("refresh:5;login.php");
	}
	
?>
