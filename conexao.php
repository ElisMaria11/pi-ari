<?php

    $hostname = "localhost";
    $banco = "elispi";
    $usuario = "root";
    $senha = "";

    $mysqli = mysqli_connect($hostname, $usuario, $senha, $banco) or die('Não foi possível conectar')
?>