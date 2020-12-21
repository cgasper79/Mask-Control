<?php 
    include ('conexion.php');
    $email = $_SESSION [ "email" ];
    $sql="SELECT * from mascarilla WHERE user = '$email' ORDER BY wash_max ASC";
    
?>

<!DOCTYPE html>
<html>

<head>
    <?php
        require_once ('header.php');
    ?>  
</head>
<body>
    <?php
        require_once ('menu.php');
    ?>  
    <div class="container">
        <h1 align="center">Mis Mascarillas</h1>
        <h6 align="center"><div>
                <?php 
                    echo ($email);
                ?>
                </div> 
        </h6>
        <a class="nav-link" href='insertar.php'> <button type="button" class="btn btn-success btn-block">+Añadir</button> </a>
        <p></p>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr align="center">
                    <th>Descripción</th>
                    <th>Lavados Restantes</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
		            $result=mysqli_query($conexion,$sql);
		            while($mostrar=mysqli_fetch_array($result)){  
                ?>
                    <tr align="center">
			            <td><a href='edicion.php?id=<?php echo $mostrar['id_mask'];?>'><?php echo $mostrar['description'] ?></td>
                        <td> 
                                <a href='lavado.php?id=<?php echo $mostrar['id_mask'];?>&wash=<?php echo $mostrar['wash_max'];?>' Onclick='return ConfirmWash()'>
                                    <?php echo $mostrar['wash_max'] ?>
                                </a>  
                        </td>
                        <td><a href='lavado.php?id=<?php echo $mostrar['id_mask'];?>&wash=<?php echo $mostrar['wash_max'];?>' Onclick='return ConfirmWash()'><button type="button" class="btn btn-primary btn-block">Lavar</button></a></td> 
                    </tr>
                         
                <?php 
                       }
	            ?>
            </tbody>
        </table>
    </div>
</body>

<div class="container-fluid p-3 my-3 bg-primary text-white">
    <footer>
        <?php
            require_once ('footer.php');
        ?>  
    </footer>
</div>
</html>