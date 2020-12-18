<?php 
    include ('conexion.php');
    $email = $_SESSION [ "email" ];
    $sql="SELECT * from mascarilla WHERE user = '$email' ORDER BY wash_max ASC";
    
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mask Control</title>
    <link rel="apple-touch-icon" href="../img/favicon.png" />
    <link  rel="icon" href="./img/favicon.png" type="image/png" />
    <link rel="stylesheet" href="./css/estilos.css">
</head>
<body>
    <?php
        require_once ('menu.php');
    ?>  

    <div class="container">
        <table class="table2">
            <caption>Mis Mascarillas
                <div id= 'user'>
                <?php 
                    echo ($email);
                ?>
                </div> 
            </caption>

            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Fecha primer uso</th>
                    <th>Lavados Restantes</th>
                </tr>
            </thead>
            <tbody>

                <?php 
		            $result=mysqli_query($conexion,$sql);
		            while($mostrar=mysqli_fetch_array($result)){  
                ?>
                    <tr>
			            <td><a href='edicion.php?id=<?php echo $mostrar['id_mask'];?>'><?php echo $mostrar['description'] ?></td>
			            <td>
                            <?php $date = date_create($mostrar['date_ini']);
                                  echo date_format($date,'d-m-Y');
                            ?>
                        </td>
                        <td><a href='lavado.php?id=<?php echo $mostrar['id_mask'];?>&wash=<?php echo $mostrar['wash_max'];?>' Onclick='return ConfirmWash()'><?php echo $mostrar['wash_max'] ?></td>
                         
                    </tr>
                         
                <?php 
                       }
	            ?>

                
            </tbody>
            
        </table>
    </div>
    <script src="./js/codigo.js"></script> 
</body>

<footer>
    <?php
        require_once ('footer.php');
    ?>  
</footer>
</html>