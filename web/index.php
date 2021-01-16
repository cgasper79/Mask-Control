<?php 
    include ('./includes/conexion.php');
    $email = $_SESSION [ 'email' ];
    
?>

<!doctype html>
<html>

<head>
    <!--Meta requeridos-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- BOOTSTRAP 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    
    
    <!-- BOOTSTRAP DATAPICKER-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- TOASTR NOTIFICATION -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />

    <!-- CSS PERSONALIZADO -->
    <link rel="stylesheet" href="./css/estilo.css" >    
    
    <!-- FAVICON -->
	<link rel="apple-touch-icon" href="./img/favicon.png" />
	<link rel="icon" href="./img/favicon.png" type="image/png" />
    
    <!--Titulo-->
    <title>Mask Control</title>
</head>

<body>

    <!-- MENU NAVEGACION -->
    
    <?php
      require_once ('./includes/menu.php');
    ?> 

   
    <!-- Jumbotron -->
    <div class="jumbotron shadow-sm text-center text-white">
        <div class="container">
            <div id="datosUsuario"> 
            </div> 
        </div>
    </div>

    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
        <strong>¡Importante!</strong> Recuerda que se debe controlar el número de lavado de todas tus mascarillas para que éstas sean efectivas.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <!-- TABLA -->
    <div class="container">  
        <div class="bg-light p-1 rounded rounded-pill shadow-sm mb-4">
            <div class="input-group">
                <input class="form-control border-0 bg-light" id="myInput" type="search" placeholder="Buscar..."></input>
                <div class="input-group-append">
                    <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>       
        <div id="tabla">
        </div>
    </div>

    <!--Modal Edicion-->
    <div class="modal fade" id="edicion">
        <div class="modal-dialog was-validated">
            <div class="modal-content">
                <!--Modal Header-->
                <div class="modal-header text-white">
                    <h4 class="modal-title">Edición mascarilla</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!--Modal Body-->
                <div class="modal-body">
                    <input type="text" hidden="" id="idMask" name="" >
                    <div class="form-group">
                        <label>Descripción:</label>
                        <input type="text" name="" id="descripcionU" class="form-control shadow-sm" required>
                        <div class="invalid-feedback">Campo obligatorio</div>
                    </div>

                    <div class="form-group">
                        <label>Fecha primer uso:</label>
                            <div class="datepicker date input-group p-0 shadow-sm">
                                <input type="text" name="" id="fechaIniU" class="form-control shadow-sm" required>
                                <div class="input-group-append"><span class="input-group-text px-4"><i class="fa fa-calendar"></i></span></div>
                                <div class="invalid-feedback">Campo obligatorio</div>
                            </div>
                    </div/>

                    <div class="form-group">
                        <label>Lavados Máximos:</label>
                        <input type="text" name="" id="lavadosMaxU" class="form-control shadow-sm" required>
                        <div class="invalid-feedback">Campo obligatorio</div>
                    </div>

                    <div class="form-group">
                        <label>Número lavados:</label>
                        <input type="text" name="" id="lavados" class="form-control shadow-sm" required>
                        <div class="invalid-feedback">Campo obligatorio</div>
                    </div>
                </div>
                <!--Modal Footer-->
                <div class="modal-footer">
                    <button type='button' class='btn btn-warning btn-block btn-lg fa fa-refresh ' id="actualizaDatos" data-dismiss="modal"> Actualizar </button>
                    <button type='button' class='btn btn-danger btn-block btn-lg fa fa-trash ' id="borrarDatos" data-dismiss="modal"> Borrar </button>
                </div>
            </div>
        </div>             
    </div>


    <!--Modal Nueva mascarilla-->
    <div class="modal fade" id="nueva">
            
            <div class="modal-dialog was-validated">
                <div class="modal-content">
                    <!--Modal Header-->
                    <div class="modal-header text-white">
                        <h2 class="modal-title">Nueva mascarilla</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!--Modal Body-->
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Descripción:</label>
                            <input type="text" name="" id="descripcion" class="form-control shadow-sm" placeholder="Breve descripción mascarilla" required>
                            <div class="invalid-feedback">Campo obligatorio</div>
                        </div>

                        <div class="form-group">
                            <label>Fecha primer uso:</label>
                            <div class="datepicker date input-group p-0">
                                <input type="text" name="" id="fechaIni" class="form-control shadow-sm" placeholder="Elije una fecha" required>
                                <div class="input-group-append"><span class="input-group-text px-4"><i class="fa fa-calendar"></i></span></div>
                                <div class="invalid-feedback">Campo obligatorio</div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Lavados Máximos:</label>    
                            <input type="text" name="" id="lavadosMax" class="form-control shadow-sm" placeholder="1 - 999" required> 
                            <div class="invalid-feedback">Campo obligatorio</div>
                        </div>
                    </div>

                    <!--Modal footer-->
                    <div class="modal-footer">
                        <button type='button' class='btn btn-success btn-block btn-lg fa fa-plus' data-dismiss="modal" id="guardarNueva"> Insertar </button>
                    </div>   
                </div>             
           </div>
           
     </div>


    <!-- BOOTSTRAP 4, JQUERY BUNDLE INCLUDE POPPER -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- BootStrap Datapicker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js" integrity="sha512-5pjEAV8mgR98bRTcqwZ3An0MYSOleV04mwwYj2yw+7PBhFVf/0KcE+NEox0XrFiU5+x5t5qidmo5MgBkDD9hEw==" crossorigin="anonymous"></script>
    
    <!-- TOASTR NOTIFICATION -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    
    <!-- PERSONALIZADOS -->
    <script src="./js/codigo.js"></script> 

</body>

<!-- Footer -->
<footer>
    <div class="container-fluid p-3 my-3 bg-primary text-white text-center shadow-sm">
        Versión 2.0.1
        <p>
            <a class="text-white fa fa-twitter fa-2x" href= 'https://twitter.com/cgasper79'></a> 
            <a class="text-white fa fa-github fa-2x" href= 'https://github.com/cgasper79/Mask-Control'></a>
        </p> 
    </div> 
</footer>

</html>