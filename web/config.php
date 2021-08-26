<?php 

//leemos los datos de la base de datos configurada en VAR de Heroku
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$servername = $url["host"];
$username = $url["user"];
$database = substr($url["path"], 1);
$password = $url["pass"];


?>



