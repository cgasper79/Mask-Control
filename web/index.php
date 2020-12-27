<?php 
    include ('./includes/conexion.php');
    $email = $_SESSION [ "email" ];
    $sql="SELECT * from mascarilla WHERE user = '$email' ORDER BY wash_max ASC";
    
?>

<!DOCTYPE html>
<html>

<head>
    <?php
        require_once ('./includes/header.php');
    ?>  
</head>

<body>
    <?php
        require_once ('./includes/menu.php');
    ?>  
    <div class="container-fluid" style="margin-top:80px">
        <h1 align="center">Mis Mascarillas</h1>
        <h6 align="center">
            <div>
                <?php 
                    echo ($email);
                ?>
            </div> 
        </h6>
        <a class="nav-link" data-toggle="modal" data-target="#nueva"> <button type="button" class="btn btn-info">+Añadir</button> </a>
        <p></p>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr align="center">
                        <th>Descripción</th>
                        <th>Lavados Restantes</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
		                $result=mysqli_query($conexion,$sql);
		                while($mostrar=mysqli_fetch_array($result)){  
                    ?>       
                        <tr align="center">
			                <td><a data-toggle="modal" data-target="#edicion" href='edicion.php?id=<?php echo $mostrar['id_mask'];?>'><?php echo $mostrar['description'] ?></a></td>
                            <td><?php echo $mostrar['wash_max'] ?></td>
                            <td><a href='lavado.php?id=<?php echo $mostrar['id_mask'];?>&wash=<?php echo $mostrar['wash_max'];?>' Onclick='return ConfirmWash()'><button type="button" class="btn btn-primary">Lavar</button></a>
                        </td> 
                        </tr>               
                    <?php 
                        }
	                ?>
                </tbody>
            </table>
        </div>
       <!--Modal Edicion-->
        <div class="modal fade" id="edicion">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--Modal Header-->
                    <div class="modal-header">
                        <h4 class="modal-title">Edición mascarilla</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!--Modal Body-->
                    <div class="modal-body">
                        <?php
                            require_once ('editar.php');
                        ?>  
                    </div>
                    
                </div>
            </div>             
        </div>
    </div>

      <!--Modal Nueva mascarilla-->
      <div class="modal fade" id="nueva">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--Modal Header-->
                    <div class="modal-header">
                        <h2 class="modal-title">Nueva mascarilla</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!--Modal Body-->
                    <div class="modal-body">
                        <?php
                            require_once ('insertar.php');
                        ?> 
                    </div> 
                </div>
            </div>             
        </div>
    </div>
</body>

<div class="container-fluid p-3 my-3 bg-primary text-white">
    <footer>
        <?php
            require_once ('./includes/footer.php');
        ?>  
    </footer>
</div>
</html>