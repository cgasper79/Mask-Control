<?php 
    include ('./conexion.php');
    $email = $_SESSION [ 'email' ];

    //Sacamos el nombre del usuario 
    $sql="SELECT * from usuario 
          WHERE email = '$email' ";

    //contamos el número de mascarillas usuario
    $sql2="SELECT * from mascarilla
            WHERE user = '$email'"; 
            
           
    $result = mysqli_query($conexion,$sql);
    $mostrar = mysqli_fetch_row($result);
    $datos=$mostrar[0]."||". //id_Usuario                               
           $mostrar[1]."||". //Nombre Usuario
           $mostrar[2]."||" //Email
                  
?>

<div class="row">
    <div class="col">
        <br>
        <h3 class="pt-4 display-6 ">Bienvenid@</h3>
        <h3 class="lead">  
            <a data-toggle="modal" data-target="#usuario" onclick="agregarDatosUsuario('<?php echo $datos ?>')" class="badge badge-secondary">
                <?php 
                    echo ($mostrar[1]); //Nombre Usuario
                ?>
            </a>
        </h3>

        <?php
            $result2 = mysqli_query($conexion,$sql2);
            $numero = mysqli_num_rows($result2);
        ?>
        <a data-toggle="modal" data-target="#nueva"> <button type="button" class="btn btn-outline-primary btn-lg shadow-sm"> + Añadir <span class="badge badge-primary"> <?php echo $numero; ?> </span></button> </a>
        <br>
    </div>
</div>




