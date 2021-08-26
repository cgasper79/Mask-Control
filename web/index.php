<?php 
    include ('./conexion.php');
    $email = $_SESSION [ 'email' ];
    if( !isset( $_SESSION[ "email" ] ) ){
        header( "Location: ./login.php" );
    } 
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

   <!-- Font Awesome icons (free version)-->
   <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    
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
      require_once ('./menu.php');
    ?> 

   
    <!-- Jumbotron -->
    <div class="jumbotron shadow-sm text-center text-white">
        <div class="container">
            <div id="datosUsuario"> 
            </div> 
        </div>    
        <br>
        
    </div>

    
    <!-- TABLA -->
    <div class="container">  

        <!-- Mensajes alertas-->
        <div id="importante" class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>¡Importante!</strong>Las mascarillas reutilizables se deben lavar de manera periódica <a data-toggle="modal" data-target="#lavadoMask" class="alert-link">Leer más</a>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <!--
        <div id="instrucciones" class="alert alert-info alert-dismissible fade show text-center" role="alert">
            <strong>Instrucciones uso App.</strong>Controla el número de lavados en tus mascarillas, ¿quieres saber cómo? <a data-toggle="modal" data-target="#instrucciones" class="alert-link">Leer más</a>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div id="pantallaInicio" class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            <strong>Pon Mask Control en la pantalla inicio de tu Móvil.</strong>¿Quieres saber cómo ponerla en tú movil como una APP? <a data-toggle="modal" data-target="#pantallaInicio" class="alert-link">Leer más</a>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        -->
        
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
                <div class="modal-header">
                    <h3 class="modal-title">Edición mascarilla</h3>
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
                    </div>

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
                    <button type='button' class='btn btn-warning btn-block btn-lg' id="actualizaDatos" data-dismiss="modal"> Actualizar </button>
                    <button type='button' class='btn btn-danger btn-block btn-lg ' id="borrarDatos" data-dismiss="modal"> Borrar </button>
                </div>
            </div>
        </div>             
    </div>


    <!--Modal Nueva mascarilla-->
    <div class="modal fade" id="nueva">
            
            <div class="modal-dialog was-validated">
                <div class="modal-content">
                    <!--Modal Header-->
                    <div class="modal-header">
                        <h3 class="modal-title">Nueva mascarilla</h3>
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
                        <button type='button' class='btn btn-success btn-block btn-lg' data-dismiss="modal" id="guardarNueva"> Insertar </button>
                    </div>   
                </div>             
           </div>       
    </div>


    <!--Modal Edicion Usuario-->
    <div class="modal fade" id="usuario">
        <div class="modal-dialog was-validated">
            <div class="modal-content">
                <!--Modal Header-->
                <div class="modal-header">
                    <h3 class="modal-title">Datos Usuarios</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!--Modal Body-->
                <div class="modal-body">
                    <input type="text" hidden="" id="idUser" name="" >
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input type="text" name="" id="nameU" class="form-control shadow-sm" required>
                        <div class="invalid-feedback">Campo obligatorio</div>
                    </div>

                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="" id="emailU" class="form-control shadow-sm" required>
                        <div class="invalid-feedback">Campo obligatorio</div>
                    </div>

                    
                </div>
                <!--Modal Footer
                <div class="modal-footer">
                    <button type='button' class='btn btn-warning btn-block btn-lg' id="actualizaUsuario" data-dismiss="modal"> Actualizar </button>
                    <button type='button' class='btn btn-danger btn-block btn-lg ' id="borrarUsuario" data-dismiss="modal"> Borrar </button>
                </div>
                -->
            </div>
        </div>             
    </div>

    <!--Modal Instrucciones uso APP-->
    <div class="modal fade" id="instrucciones">
            <div class="modal-dialog">
                <div class="modal-content">
  
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h3 class="modal-title">¿Cómo uso esta APP?</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
  
                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>  
                            El uso de esta App es muy sencillo e intuitivo, solo tienes que seguir los siguientes pasos: 
                            
                        </p>

                        <p>
                            <ol>
                                <li> Primero tienes que incluir tus mascarillas con los datos requeridos (Nombre, fecha de primer uso y lavados permitidos). Pulsa al botón <strong>- + Añadir </strong> verás que al lado de este botón aparece el número de mascarillas que tienes activas.
                                    <img class="img-thumbnail" src="img/instrucciones/paso-1.jpg" alt="" /> 
                                </li>

                                <li> Para editar los datos o eliminar mascarillas, solo tienes que hacer click encima del nombre de la mascarilla y se te abrirá un menú de edición.
                                    <img class="img-thumbnail" src="img/instrucciones/paso-2.jpg" alt="" /> 
                                </li>

                                <li> Para incluir un lavado, solo tienes que hacer click encima del botón <strong>lavar</strong> , Verás que al lado de este botón aparece el número de lavados restantes. Utiliza el campo de <strong>Buscar</strong> si necesitas buscar una mascarilla en concreto.

                                    <img class="img-thumbnail" src="img/instrucciones/paso-3.jpg" alt="" /> 
                                </li>

                            </ol>
                        </p>

                        
                            
                    </div>
  
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
  
                 </div>
            </div>
        </div>


    <!--Modal Recomendaciones Lavado Mascarillas-->
    <div class="modal fade" id="lavadoMask">
            <div class="modal-dialog">
                <div class="modal-content">
  
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h3 class="modal-title">¿Cómo lavar correctamente las mascarillas?</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
  
                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>  
                            <img class="img-thumbnail" src="img/lavado/lavado-1.jpg" alt="" />
                            <br>
                            El Ministerio de Sanidad publicó en abril de 2020 las formas recomendadas de lavado de mascarillas reutilizables y la norma de mascarillas reutilizables indica que se ha de optar por alguna de estas formas:  
                        </p>

                        <p>  
                            <ol>
                                <li> Lavar con detergente normal y agua a temperatura entre 60 ºC y 90 ºC (ciclo normal de lavado).</li>
                                <li> Sumergir en una dilución de agua con lejía (dilución 1:50) durante 30 minutos. Después lavar bien con agua y jabón y aclarar para eliminar los restos de lejía.</li>
                                <li> Usar un viricida autorizado (norma EN 14476). Una vez desinfectadas,las mascarillas deben lavarse con abundante agua y jabón para eliminar restos químicos.</li>
                            </ol>
                        </p>
                            
                    </div>
  
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
  
                </div>
            </div>
    </div>

    <!--Modal Intro-->
    <div class="modal fade" id="intro">
            <div class="modal-dialog">
                <div class="modal-content">
  
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h3 class="modal-title">Mask Control</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
  
                    <!-- Modal body -->
                    <div class="modal-body">
                        
                        <p>
                            Con <strong>Mask Control</strong> podrás controlar de manera sencilla el número de lavados restantes de tus mascarillas lavables.
                        </p>
                        
                        <p>      
                            El uso de esta WebApp es totalmente gratuito y no hago ningún negocio con los datos de registro. Este será el único mensaje de publicidad que recibirás.
                        </p>

                        <p>
                           Esta web está diseñada en PHP y hospedada en un servidor propio, puedes consultar este proyecto en mi perfil de <a href="https://github.com/cgasper79/Mask-Control">Github</a>     
                        </p>

                        <p>
                            Si estás interesado en diseñar <strong>tu web personal</strong> o para <strong>tu pequeño negocio </strong> puedes <a href="https://gasperwebdesign.com">visitar mi web </a>y hablamos de tu próximo proyecto web.
                        </p>
                        <p>
                        <a href="https://gasperwebdesign.com"> <img class="logo" src="./img/logo.png" alt=""/></a>
                        </p>
                            
                    </div>
  
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
  
                </div>
            </div>
    </div>                            



    <!--Modal Poner pantalla inicio móvil-->
    <div class="modal fade" id="pantallaInicio">
            <div class="modal-dialog">
                <div class="modal-content">
  
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h3 class="modal-title">¿Cómo poner esta webApp como una APP en tu móvil?</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
  
                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>  
                            <img class="img-thumbnail" src="img/pantalla/pantalla-1.jpeg" alt="" />
                            <br>
                            Mask Control es una webApp, ¿que significa esto? pues que no <strong>requiere instalar nada en tu dispositivo móvil</strong>, se ejecuta directamente desde el navegador predeterminado en tu dispositivo. Si quieres poner Mask Control en tu móvil como una APP nativa, sigue estos pasos:   
                        </p>

                        <h2>
                            <strong>IOS</strong>
                        </h2>
                        <p>  
                        Con la webApp Mask Control abierta en Safari:
                            <ol>
                                <li> Pulsa el botón compartir (el icono central de la barra inferior)</li>
                                <li> Selecciona <strong>Añadir a la pantalla de inicio</strong></li>
                                <li> Aparecerá el nombre por defecto de <strong>Mask Control</strong> pero puedes cambiarlo</li>
                                <li> Pulsa <strong>añadir</strong></li>                                
                            </ol>
                        </p>
                        <h2>
                            <strong>Android</strong>
                        </h2>

                        <p>  
                        Con la webApp Mask Control abierta en Google Chrome:
                            <ol>
                                <li> Pulsa el botón de ajustes (los tres puntitos de arriba a la derecha)</li>
                                <li> Selecciona <strong>Añadir a la pantalla de inicio</strong></li>
                                <li> Aparecerá el nombre por defecto de <strong>Mask Control</strong> pero puedes cambiarlo</li>
                                <li> Pulsa <strong>añadir automàticamente</strong></li>                                
                            </ol>
                        </p>
                    </div>
  
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
  
                </div>
            </div>
    </div>
    
    <div align="center" class="container">
        <div alig="center" class="logoFooter">
            <a href="https://gasperwebdesign.com"> <img class="logo" src="./img/logo.png" alt=""/>
            <p>Tu web a medida</p>
            </a>
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
<footer id="footer">
    <div class="footer container-fluid p-3 my-3 bg-primary text-white text-left shadow-sm">
      
      <div>
        <a href="https://twitter.com/cgasper79"><i class="fab fa-twitter fa-2x"></i></a>
        <a href="https://www.instagram.com/gasperwebdesign"><i class="fab fa-instagram fa-2x"></i></a>
        <a href="https://github.com/cgasper79"><i class="fab fa-github fa-2x"></i></a>
        <a href="mailto:cgasconp@protonmail.com" ><i class="fas fa-envelope-square fa-2x"></i></a>
      </div>
      <div>
        Mask Control V3.0.2
      </div>
      <div class="credits">
        Designed by <a href="https://gasperwebdesign.com/">Gasperwebdesign</a>
      </div>
    </div>
    
  </footer><!-- End Footer -->

</html>