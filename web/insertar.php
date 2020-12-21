<?php 
    include ('conexion.php');
    $email = $_SESSION [ "email" ];
    
?>

<!DOCTYPE html>
<html>

<head>
    <?php
        require_once ('header.php');
    ?>  
</head>

<body>
    <?php
        require_once ('menu.php');
    ?>  
    <div class="container-fluid">
        <h2>Introduce los datos</h2>
        <div class='form-group'>
            <form action = "nuevo.php" method = "POST">
                <label>Descripción</label>
                <p><input type="text" value = "" name = "descripcion" placeholder="Breve descripción"></p>
                <label>Fecha primer uso</label>
                <p><input type="text" value = "" name = "fecha" onkeyup="mascara(this,'-',patron,true)" placeholder="dd-mm-YYYY"></p>
                <label>Lavados Máximos</label>
                <p><input type="text" value = "" name = "lavados" placeholder="Valor de 1 a 999"></p>            
                <button type='submit' Onclick='return ConfirmAdd()' class='btn btn-success btn-block btn-lg' > Insertar </button>  
                <a href='index.php'> <button type='button' class="btn btn-light btn-block btn-lg"> Cancelar </button></a>      
            </form> 
        </div>
    </div>
    
  
</body>

<div class="container-fluid p-3 my-3 bg-primary text-white">
    <footer>
        <?php
            require_once ('footer.php');
        ?>  
    </footer>
</div>

</html>