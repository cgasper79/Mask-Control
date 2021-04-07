<?php 
    include ('./conexion.php');
    $email = $_SESSION [ 'email' ];

    //Sacamos el nombre del usuario 
    $sql="SELECT * from usuario 
          WHERE email = '$email' ";

    //contamos el número de mascarillas usuario
    $sql2="SELECT * from mascarilla
            WHERE user = '$email'";           
    
?>

<div class="row">
    <div class="col">
        <br>
        <h3 class="display-4 ">Mask Control</h3>
        <p class="lead">
            <?php 
                $result = mysqli_query($conexion,$sql);
                $mostrar = mysqli_fetch_row($result);
                echo ($mostrar[1]);
            ?>
        </p>
        <?php
            $result2 = mysqli_query($conexion,$sql2);
            $numero = mysqli_num_rows($result2);
        ?>
        <a data-toggle="modal" data-target="#nueva"> <button type="button" class="btn btn-outline-primary btn-lg shadow-sm"> + Añadir <span class="badge badge-primary"> <?php echo $numero; ?> </span></button> </a>
        <br>
    </div>
</div>


