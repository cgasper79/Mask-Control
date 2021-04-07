<?php 



include('./config.php');

session_start();
//definimos tiempo de sesión en 1 hora
define( 'MAX_SESSION_TIEMPO', 3600 * 1 );


// Controla cuando se ha creado la sesión  
if ( isset( $_SESSION[ 'ULTIMA_ACTIVIDAD' ] ) && 
     ( time() - $_SESSION[ 'ULTIMA_ACTIVIDAD' ] > MAX_SESSION_TIEMPO ) ) {
    // Si ha pasado el tiempo sobre el limite destruye la session
    if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 3600,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
		);
	}
	session_destroy();
	header( "Location: ./login.php" );
}

$_SESSION[ 'ULTIMA_ACTIVIDAD' ] = time();

//Creamos conexión con Base de datos
$conexion=mysqli_connect($servername,$username,$password,$database);

// Comprobamos conexión
if (!$conexion) {
	die("Connection failed: " . mysqli_connect_error());
 }

?>



