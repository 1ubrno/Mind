<?php 
    $usuario = 'root';
    $senha = '';
    $database = 'login';
    $host = 'localHost';

    $mysqli = new mysqli($host, $usuario, $senha, $database);

        if ($mysqli->error) {
            die("falha ao se conectar no banco de dados " .$mysqli->error);
        }