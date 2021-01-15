<nav class="navbar navbar-expand-md bg-primary navbar-dark fixed-top shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="index.php">Mask Control</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">

      <ul class="navbar-nav ml-auto">

        <li class="nav-item active">
          <a class="nav-link" data-toggle="modal" data-target="#nueva" href='insertar.php'>+ Añadir</a>
        </li>

        <li class="nav-ite" hidden="">
          <a class="nav-link" href='./admin/myphp-backup.php'>BackUp</a>
        </li> 

        <li class="nav-item">
           <a class="nav-link" data-toggle="modal" data-target="#sesion">Cerrar Sesión</a>
        </li>
      </ul>
    </div>  
</div>
</nav>

<!--Modal Cierre Sesión-->
<div class="modal fade" id="sesion">
  <div class="modal-dialog">
    <div class="modal-content">

      <!--Modal Header-->
      <div class="modal-header text-white">
        <h2 class="modal-title">Cierre sesión</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!--Modal Body-->
      <div class="modal-body">  
        <label>¿Quieres cerrar la sesión?</label>       
      </div>

      <!--Modal footer-->
      <div class="modal-footer">
        <button type='button' class='btn btn-success btn-block btn-lg' data-dismiss="modal" id="cerrarSesion"> Si </button></a>
      </div>   
                  
    </div>
  </div>             
</div>


