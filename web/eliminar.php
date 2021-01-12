<?php 
    include ('./includes/conexion.php');
    $id = $_POST['id'];
    $sql = "DELETE FROM mascarilla WHERE id_mask = '$id' ";  

    echo $result=mysqli_query($conexion,$sql);
?>

