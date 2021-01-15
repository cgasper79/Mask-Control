<?php 
    include ('./includes/conexion.php');

    $id = $_POST['id'];
    $wash_max = $_POST['lavadosMax'];
    $wash = $_POST['lavados'];
    $wash_left = $_POST['lavadosLeft'];

    $sql = "UPDATE mascarilla 
            SET wash = $wash, wash_left = $wash_left
            WHERE id_mask = $id ";  
    
    echo $result=mysqli_query($conexion,$sql);

?>
