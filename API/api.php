<?php

    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $mydb = 'vendas';
    $conn = new mysqli($server, $user, $pass, $mydb);
    
    if($conn->connect_error){
        die('Conexão Falhou: '.$conn>connect_error);
    }
?>
