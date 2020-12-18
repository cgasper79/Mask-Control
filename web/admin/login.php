<?php
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	header('Content-Type: text/html; charset=UTF-8');
	
?>

<html>
	<head>
		<title>Mask Control V1.0</title>
		<link rel=”icon” type="image/png" href="/favicon.png">
		<link rel="stylesheet" href="../css/estilos.css">
	</head>

	<body>
		<div class='warp'>
			<form class= 'form_login' method="post" action="comprobarLogin.php">
				<div class="form-group">
				<h2>Mask Control 1.0</h2>
				</div>
				<div class="form-group">
				<input type="text" name="email" class="form-input" placeholder="Email"/>
				</div>
				<div class="form-group">
				<input type="password" name="password" class="form-input" placeholder="Password"/>
				</div>
				<div class="form-group">
				<button type="submit" value="Enviar" class="boton_login">Enviar</button>
				</div>
			</form>
		</div>
		
	</body>
</html>