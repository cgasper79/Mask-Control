<?php
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	header('Content-Type: text/html; charset=UTF-8');
	
?>

<html>
	<head>
		<?php
        	require_once ('../includes/header.php');
    	?>  
	</head>

	<body>
		<div class=".container pt-5">
		    <div class="row">
			    <div class="col"></div>
				<div class="col-lg-4 border shadow p-3 mb-6 bg-white rounded">
					<h2 align="center">Mask Control</h2>
					<div align="center">
      					<img src="../img/favicon.png" id="icon" alt="User Icon" />
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
							<button type="submit" value="Enviar" class="btn btn-primary btn-block">Enviar</button>	
						</div>
					</form>
				</div>
				<div class="col"></div>
			</div>
		</div>
	</body>
</html>