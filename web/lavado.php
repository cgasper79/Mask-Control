<?php 
    include ('conexion.php');

    $id = $_GET['id'];
    $wash = $_GET['wash'];

    $wash = $wash -1;
   
    $sql = "UPDATE mascarilla SET wash_max = $wash WHERE id_mask = $id ";  


    if ($wash < 0){
        #echo 'Esta mascarilla ya no tiene más lavados';
    }
    else {
        mysqli_query($conexion,$sql);
    }


    include ('index.php');
?>
