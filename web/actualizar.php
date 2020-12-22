<?php 
    include ('./includes/conexion.php');

    $id = $_POST['id'];
    $descripcion = $_POST ['descripcion'];
    $fecha = date_create($_POST ['fecha']);
    $date = date_format($fecha,'Y-m-d');
    $lavados = $_POST ['lavados'];

    $sql = "UPDATE mascarilla SET description = '$descripcion' , date_ini = '$date' , wash_max = '$lavados' WHERE id_mask = '$id'";  


    mysqli_query($conexion,$sql);
    include ('index.php');
?>

