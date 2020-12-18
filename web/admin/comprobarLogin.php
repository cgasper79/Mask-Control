<?php
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	header('Content-Type: text/html; charset=UTF-8');

	$servername = getenv (HOST);
	$username = getenv (USER_DB);
	$database = getenv (DATABASE);
	$password = getenv (PASSWORD_USER_DB);

	$conn = mysqli_connect( $servername, $username, $password, $database );
	if ( !$conn ) {
	    die( "Connection failed: " . mysqli_connect_error() );
	}
	
	$email = $_POST[ "email" ];
	$password = md5( $_POST[ "password" ] );
	$sql = "SELECT * FROM usuario WHERE email LIKE '{$email}' AND password LIKE '%{$password}%'";
	$result = mysqli_query( $conn, $sql );
	if( mysqli_num_rows( $result ) ){
		session_start();
		$_SESSION[ "email" ] = $email;
		header( "Location: ../index.php" );
	}else{
		header( "Location: login.php" );
	}
?>