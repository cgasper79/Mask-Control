<?php 
    include ('./includes/conexion.php');

    $id = $_POST['id'];
    $description = $_POST ['descripcion'];
    $fecha = date_create($_POST ['fechaIni']);
    $date_ini = date_format($fecha,'Y-m-d');
    $wash_max = $_POST ['lavadosMax'];
    $wash = $_POST['lavados'];
    $wash_left = $wash_max - $wash;

    $sql = "UPDATE mascarilla 
            SET description = '$description' , date_ini = '$date_ini' , wash_max = '$wash_max' , wash = '$wash' , wash_left = '$wash_left'
            WHERE id_mask = '$id'";  

    echo $result=mysqli_query($conexion,$sql);

?>

