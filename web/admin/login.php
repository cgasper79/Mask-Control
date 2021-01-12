<?php
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	header('Content-Type: text/html; charset=UTF-8');
?>

<!doctype html>
<html lang="en">
	<head>
		<!--Meta requeridos-->
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    
    	<!-- BOOTSTRAP 4 CSS -->
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    
    
    	<!-- FAVICON -->
		<link rel="apple-touch-icon" href="../img/favicon.png" />
		<link rel="icon" href="../img/favicon.png" type="image/png" />
    
   		 <!--Titulo-->
    	<title>Mask Control</title>
	</head>

	<body>
		<div class="container pt-5">
		    <div class="row">
			    <div class="col"></div>
				<div class="col-lg-4 border shadow p-3 mb-6 bg-white rounded">
					<h1 align="center">Mask Control</h1>
					<div align="center">
      					<img src="../img/favicon.png" id="icon" alt="User Icon" width="25%" height="25%" />
					</div>
					<form method="post" action="comprobarLogin.php" class="was-validated">			
						<div class="form-group p-3">
							<label for="uname">Usuario:</label>
							<input type="text" id="uname" class="form-control" placeholder="Email" name="email" required>
							<div class="valid-feedback">Válido.</div>
      						<div class="invalid-feedback">Por favor rellena este campo.</div>
						</div>

						<div class="form-group p-3">
							<label for="pwd">Contraseña:</label>
							<input type="password" id="pwd" class="form-control" placeholder="Password" name="password" required>
				   			<div class="valid-feedback">Válido.</div>
      						<div class="invalid-feedback">Por favor rellena este campo.</div>
						</div>
						<div class="p-3" align="center">
							<button type="submit" value="Enviar" class="btn btn-primary btn-lg btn-block">Enviar</button>	
						</div>
					</form>
				</div>
				<div class="col"></div>
			</div>
		</div>

		<!-- BOOTSTRAP 4, JQUERY BUNDLE INCLUDE POPPER -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    	<!-- PERSONALIZADOS -->
    	<script src="./js/codigo.js"></script> 

	</body>
</html>