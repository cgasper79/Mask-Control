
<?php 
    include ('conexion.php');
    $email = $_SESSION [ "email" ];
    $id = '15';
    $sql = "SELECT * FROM mascarilla WHERE id_mask = $id "; 
    $result=mysqli_query($conexion,$sql);
	while($mostrar=mysqli_fetch_array($result)){  
?>

<div class="container-fluid">

    <form action = "actualizar.php" method = "POST">

        <div class='form-group'>
            <label>Descripción:</label>
            <input type="text" class="form-control" value = "<?php echo $mostrar['description'] ?>" name = "descripcion">
        </div>

        <div class='form-group'>
            <label>Fecha primer uso:</label>
            <input type="text" class="form-control" value = "<?php $date = date_create($mostrar['date_ini']); echo date_format($date,'d-m-Y'); ?>" name = "fecha">           
        </div>
   
        <div class='form-group'>
            <label>Lavados Restantes:</label>
            <input type="text" class="form-control" value = "<?php echo $mostrar['wash_max'] ?>" name = "lavados">
            <input type="hidden" value = "<?php echo $mostrar['id_mask'] ?>" name = "id">
        </div>

        <button type='submit' Onclick='return ConfirmUpdate()' class='btn btn-primary btn-block btn-lg' value='Actualizar'> Actualizar </button>
        <a href='index.php'> <button type='button' class="btn btn-light btn-block btn-lg"> Cancelar </button></a>
        <a href='eliminar.php?id=<?php echo $mostrar['id_mask'];?>'> <button type='button' Onclick='return ConfirmDelete()' class="btn btn-danger btn-block btn-lg">Eliminar</button></a>   
        <?php 
            } mysqli_free_result($result);
        ?>        
    </form> 
</div>