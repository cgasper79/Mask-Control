<?php 
    include ('conexion.php');
    $email = $_SESSION [ "email" ];
    
?>

<div class="container-fluid">
    
    <form action = "nuevo.php" method = "POST">

        <div class='form-group'>
            <label>Descripción:</label>
            <input type="text" class="form-control" value = "" name = "descripcion" placeholder="Breve descripción"></p>
        </div>

        <div class='form-group'>
            <label>Fecha primer uso:</label>
            <input class="form-control" type="text" value = "" name = "fecha" onkeyup="mascara(this,'-',patron,true)" placeholder="dd-mm-YYYY"></p>
        </div>

        <div class='form-group'>
            <label>Lavados Máximos:</label>
            <input type="text" class="form-control" value = "" name = "lavados" placeholder="Valor de 1 a 999"></p>            
            <button type='submit' Onclick='return ConfirmAdd()' class='btn btn-primary btn-block btn-lg' > Insertar </button>  
            <a href='index.php'> <button type='button' class="btn btn-light btn-block btn-lg"> Cancelar </button></a>      
        </div>  
    </form>    
</div>
    
