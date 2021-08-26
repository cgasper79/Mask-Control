<?php 
    include ('./conexion.php');

    $id = $_POST['id'];
    $descripcion = $_POST ['descripcion'];
    $fecha = date_create($_POST ['fechaIni']);
    $date_ini = date_format($fecha,'Y-m-d');
    $wash_max = $_POST ['lavadosMax'];
    $wash = $_POST['lavados'];
    $wash_left = $wash_max - $wash;
    $email = $_SESSION [ 'email' ];

    $sql = "SELECT * from mascarilla 
             WHERE description = '$descripcion' AND NOT id_mask = '$id' AND user ='$email' ";
    $result=mysqli_query($conexion,$sql);
    $repetidos = mysqli_num_rows($result);


    if($repetidos==0){
        $sql2 = "UPDATE mascarilla 
            SET description = '$descripcion' , date_ini = '$date_ini' , wash_max = '$wash_max' , wash = '$wash' , wash_left = '$wash_left'
            WHERE id_mask = '$id'";  
        $actualizar=mysqli_query($conexion,$sql2);
        echo 1;
    }else{
        echo 0;
    }
      

?>

