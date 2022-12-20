<?php
    $host = "localhost";
    $database = 'alagoinh_supermercado'; 
    $user = "root";
    $password = "root";

    $mysqli = new mysqli($host, $user, $password, $database);

    if($mysqli->error) {
        die("Falha ao conectar ao banco de dados" . $mysqli->error) . $mysqli->connect_error;
    }
?>