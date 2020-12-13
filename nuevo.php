<?php 
    include ('conexion.php');

    $descripcion = $_POST ['descripcion'];
    $fecha = date_create($_POST ['fecha']);
    $date = date_format($fecha,'Y-m-d');
    $lavados = $_POST ['lavados'];
    $email = $_SESSION [ 'email' ];

    $sql = "INSERT INTO mascarilla (description, date_ini, wash_max, user) VALUES ('$descripcion' , '$date' , '$lavados' , '$email')";  
    

    mysqli_query($conexion,$sql);
    include ('index.php');
?>