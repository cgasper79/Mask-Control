<?php 
    include ('conexion.php');
    $email = $_SESSION [ "email" ];
    $id = $_GET['id'];
    $sql = "SELECT * FROM mascarilla WHERE id_mask = $id ";  
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mascarillas</title>
    <link rel="stylesheet" href="./css/estilos.css">
</head>
<body>

    <?php
        require_once ('menu.php');
    ?>  

    <div class="container">
        <table class="table">
            <caption>Edición mascarilla</caption>
            
                <?php 
		            $result=mysqli_query($conexion,$sql);
		            while($mostrar=mysqli_fetch_array($result)){  
                ?>
                    <tr>
                    <form action = "actualizar.php" method = "POST">
                    <th class='ficha'>Descripción</th>
                        <td><input type="text" value = "<?php echo $mostrar['description'] ?>" name = "descripcion"></td>
                    <th class='ficha'>Fecha primer uso</th>
                        <td><input type="text" 
                                    value = "<?php $date = date_create($mostrar['date_ini']);
                                                            echo date_format($date,'d-m-Y'); ?>" 
                                    name = "fecha">
                        </td>
                    <th class='ficha'>Lavados Restantes</th>
                        <td><input type="text" value = "<?php echo $mostrar['wash_max'] ?>" name = "lavados"></td>
                        <input type="hidden" value = "<?php echo $mostrar['id_mask'] ?>" name = "id">

                        <td> <button type='submit' Onclick='return ConfirmUpdate()' class='boton_submit' value='Actualizar'> Actualizar</td>
                        <td><a href='eliminar.php?id=<?php echo $mostrar['id_mask'];?>'> <button type='button' Onclick='return ConfirmDelete()' class='boton_eliminar'>Eliminar</button></a></td>
                    
                        <?php 
                            } mysqli_free_result($result);
	                    ?>
                    </tr>
                    </form>
            
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
