<?php 
    include ('./includes/conexion.php');
    $email = $_SESSION [ "email" ];
    
?>

<div class="container-fluid">
    
    <form action = "nuevo.php" method = "POST">

        <div class='form-group'>
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" class="form-control" placeholder="Breve descripción" value = "" name = "descripcion"  required>
        </div>

        <div class='form-group'>
            <label>Fecha primer uso:</label>
            <input class="form-control" type="text" value = "" name = "fecha" onkeyup="mascara(this,'-',patron,true)" placeholder="dd-mm-YYYY" required>
        </div>

        <div class='form-group'>
            <label>Lavados Máximos:</label>
            <input type="text" class="form-control" value = "" name = "lavados" placeholder="Valor de 1 a 999" required></p>            
            <button type='submit' Onclick='return ConfirmAdd()' class='btn btn-primary btn-block btn-lg' > Insertar </button>  
            <a href='index.php'> <button type='button' class="btn btn-light btn-block btn-lg"> Cancelar </button></a>      
        </div>  
    </form>    
</div>
    
