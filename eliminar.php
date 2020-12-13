<?php 
    include ('conexion.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM mascarilla WHERE id_mask = '$id' ";  

    mysqli_query($conexion,$sql);
    include ('listado.php');
?>

