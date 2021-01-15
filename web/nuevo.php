
<?php 
    include ('./includes/conexion.php');
    
    $descripcion = $_POST ['descripcion'];
    $fecha = date_create($_POST ['fechaIni']);
    $date = date_format($fecha,'Y-m-d');
    $wash_max = $_POST ['lavadosMax'];
    $email = $_SESSION [ 'email' ];

    $sql = "INSERT INTO mascarilla (description, date_ini, wash_max, user, wash, wash_left) VALUES ('$descripcion' , '$date' , '$wash_max' , '$email' , '0' , '$wash_max' )";  
    
    echo $result=mysqli_query($conexion,$sql);
    
?>