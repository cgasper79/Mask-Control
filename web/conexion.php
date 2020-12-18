<?php 

$servername = '192.168.1.110';
$username = 'cristian';
$database = 'mask_db';
$password = 'gascoing1979';


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



