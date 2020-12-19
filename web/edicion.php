<?php 
    include ('conexion.php');
    $email = $_SESSION [ "email" ];
    $id = $_GET['id'];
    $sql = "SELECT * FROM mascarilla WHERE id_mask = $id ";  
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

    <div class="container-fluid">
        <h2>Edición mascarilla</h2>
        <?php 
		    $result=mysqli_query($conexion,$sql);
	        while($mostrar=mysqli_fetch_array($result)){  
        ?>
        <div class='form-group'>   
            <form action = "actualizar.php" method = "POST">
            <label>Descripción</label>
            <p><input type="text" value = "<?php echo $mostrar['description'] ?>" name = "descripcion"></p>
            <label>Fecha primer uso</label>
            <p><input type="text" 
                   value = "<?php $date = date_create($mostrar['date_ini']);
                                  echo date_format($date,'d-m-Y'); ?>" 
                                    name = "fecha">
            </p>
            <label class='ficha'>Lavados Restantes</label>
            <p><input type="text" value = "<?php echo $mostrar['wash_max'] ?>" name = "lavados"></p>
            <input type="hidden" value = "<?php echo $mostrar['id_mask'] ?>" name = "id">
            <button type='submit' Onclick='return ConfirmUpdate()' class='btn btn-primary btn-block btn-lg' value='Actualizar'> Actualizar </button>
            <a href='index.php'> <button type='button' class="btn btn-light btn-block btn-lg"> Cancelar </button></a>
            <a href='eliminar.php?id=<?php echo $mostrar['id_mask'];?>'> <button type='button' Onclick='return ConfirmDelete()' class="btn btn-danger btn-block btn-lg">Eliminar</button></a>
        </div>       
        <?php 
            } mysqli_free_result($result);
	    ?>        
        </form>       
    </div>
    <script src="./js/codigo.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body>

<div class="container-fluid p-3 my-3 bg-primary text-white">
    <footer>
        <?php
            require_once ('footer.php');
        ?>  
    </footer>
</div>

</html>
