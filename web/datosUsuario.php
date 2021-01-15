<?php 
    include ('./includes/conexion.php');
    $email = $_SESSION [ 'email' ];

    //contamos el número de mascarillas usuario
    $sql3="SELECT * from mascarilla
            WHERE user = '$email'"; 
    
?>

<div class="row">
    <div class="col">
        <br>
        <h3 class="display-4 ">Mis Mascarillas</h3>
        <p class="lead"><?php echo ($email);?></p>
        <?php
            $result3 = mysqli_query($conexion,$sql3);
            $numero = mysqli_num_rows($result3);
        ?>
        <a data-toggle="modal" data-target="#nueva"> <button type="button" class="btn btn-outline-primary btn-lg shadow-sm"> + Añadir <span class="badge badge-primary"> <?php echo $numero; ?> </span></button> </a>
        <br>
    </div>
</div>


