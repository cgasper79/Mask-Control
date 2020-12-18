<?php 

$servername = 'localhost';
$username = 'user';
$database = 'databasedb';
$password = 'pass';


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



