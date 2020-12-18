<?php 
    include ('conexion.php');
    $email = $_SESSION [ "email" ];
    
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mascarillas</title>

    <link rel="stylesheet" href="./css/estilos.css">
</head>
<body>
    <?php
        require_once ('menu.php');
    ?>  

    <div class="container">
        <table class="table">
            <caption>Introduce los datos</caption>
            
                <tr>
                    <form action = "nuevo.php" method = "POST">
                    <th>Descripción</th>
                        <td><input type="text" value = "" name = "descripcion" placeholder="Breve descripción"></td>
                    <th>Fecha primer uso</th>
                        <td><input type="text" value = "" name = "fecha" onkeyup="mascara(this,'-',patron,true)" placeholder="dd-mm-YYYY"></td>
                    <th>Lavados Máximos</th>
                        <td><input type="text" value = "" name = "lavados" placeholder="Valor de 1 a 999"></td>            
                        <td><button type='submit' Onclick='return ConfirmAdd()' class='boton_submit' > Insertar </td>
                        <td></td>
                </tr>
                    </form> 
        </table>
    </div>
    <script src="./js/codigo.js"></script>  
</body>

<<footer>
    <?php
        require_once ('footer.php');
    ?>  
</footer>
</html>