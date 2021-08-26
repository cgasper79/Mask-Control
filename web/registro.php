
<!doctype html>
<html lang="es">
	<head>
		<!--Meta requeridos-->
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    
    	<!-- BOOTSTRAP 4 CSS -->
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    
    
    	<!-- FAVICON -->
		<link rel="apple-touch-icon" href="./img/favicon.png" />
		<link rel="icon" href="./img/favicon.png" type="image/png" />
		
		<!-- CSS PERSONALIZADO -->
		<link rel="stylesheet" href="./css/estilo.css" >

   		 <!--Titulo-->
    	<title>Mask Control</title>
	</head>

	<body>
		<div class="container pt-5">
		    <div class="row">
			    <div class="col"></div>
				<div class="col-lg-4 col-xs-4 border shadow p-3 mb-6 bg-white rounded">
					<div align="center">
						<img class="logo" src="./img/logo.png"/>
						<h2>Mask Control</h2>
					</div>
					<div align="center">
      					<img src="./img/favicon.png" id="icon" alt="User Icon" width="25%" height="25%" />
					</div>
					<br>
					
					<form method="post" action="comprobarRegistro.php" class="was-validated">			
						<div class="form-group p-1">
							<label for="name">Nombre:</label>
							<input type="text" id="name" class="form-control" placeholder="Nombre" name="name" required>
      						<div class="invalid-feedback">Por favor rellena este campo.</div>
						</div>
						<div class="form-group p-1">
							<label for="email">Email:</label>
							<input type="email" id="email" class="form-control" placeholder="Email" name="email" required>
      						<div class="invalid-feedback">Por favor rellena este campo.</div>
						</div>

						<div class="form-group p-1">
							<label for="pwd">Contraseña:</label>
							<input type="password" id="pwd" class="form-control" placeholder="Password" name="password" required>
      						<div class="invalid-feedback">Por favor rellena este campo.</div>
						</div>
						<div class="p-1" align="center">
							<button type="submit" value="registrar" class="btn btn-primary btn-lg btn-block">Registrarme</button>	
						</div>
					</form>
					<div class="p-1" align="center">
							<a class="text-primary" href="./login.php">- Inicio sesión -</a>
						</div>

				</div>
				<div class="col"></div>
			</div>
		</div>

		
		<!-- BOOTSTRAP 4, JQUERY BUNDLE INCLUDE POPPER -->
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

		<!-- TOASTR NOTIFICATION -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
		
    	<!-- PERSONALIZADOS -->
    	<script src="../js/codigo.js"></script> 

	</body>
</html>