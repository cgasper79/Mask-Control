
<?php 
    include ('./includes/conexion.php');
    
    $descripcion = $_POST ['descripcion'];
    $fecha = date_create($_POST ['fechaIni']);
    $date = date_format($fecha,'Y-m-d');
    $wash_max = $_POST ['lavadosMax'];
    $email = $_SESSION [ 'email' ];

    $sql = "SELECT * from mascarilla 
             WHERE description = '$descripcion' ";
    $result=mysqli_query($conexion,$sql);
    $repetidos = mysqli_num_rows($result);

    if($repetidos==0){
        $sql2 = "INSERT INTO mascarilla 
                (description, date_ini, wash_max, user, wash, wash_left) 
                VALUES ('$descripcion' , '$date' , '$wash_max' , '$email' , '0' , '$wash_max' )";  
        $insertar=mysqli_query($conexion,$sql2);
        echo 1;
    }else{
        echo 0;
    }
       
?>