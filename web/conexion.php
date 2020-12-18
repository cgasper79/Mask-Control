<?php 

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$servername = $url["host"];
$username = $url["user"];
$database = substr($url["path"], 1);
$password = $url["pass"];


session_start();
	if( !isset( $_SESSION[ "email" ] ) ){
		header( "Location: ./admin/login.php" );
	}

//Creamos conexión con Base de datos
$conexion=mysqli_connect($servername,$username,$password,$database);

// Comprobamos conexión
if (!$conexion) {
	die("Connection failed: " . mysqli_connect_error());
 }


?>



