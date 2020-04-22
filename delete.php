<?php
    //Rota API: http://localhost/atvAula6/update.php?tabela=vendedor&cod-venda=id
    include_once('./API/api.php');

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $tabela = filter_input(INPUT_GET, 'tabela', FILTER_SANITIZE_SPECIAL_CHARS);
            $codVenda = isset($_GET['cod-venda'])
                        ? filter_input(INPUT_GET, 'cod-venda', FILTER_SANITIZE_SPECIAL_CHARS)
                        : '';
        }

    $sql = 'DELETE FROM '.$tabela;
    $sql .= ' WHERE CODVEND = ?';
        
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $codVenda);

    $stmt->execute();

    if($stmt->execute() === TRUE){
        echo 'Registro deletado';
    }else{
        echo 'Error: '.$sql.'<br>'.$conn->error;
    } 
?>