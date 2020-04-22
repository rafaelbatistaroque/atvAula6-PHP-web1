<?php
    //Rota API: http://localhost/atvAula6/read.php?tabela=vendedor&cod-venda=6
    include_once('./API/api.php');
     if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $tabela = filter_input(INPUT_GET, 'tabela', FILTER_SANITIZE_SPECIAL_CHARS);
        $codVenda = isset($_GET['cod-venda'])
                    ? filter_input(INPUT_GET, 'cod-venda', FILTER_SANITIZE_SPECIAL_CHARS)
                    : '';
    }

    $sql = 'SELECT * FROM '.$tabela;
    $sql .= $codVenda != '' ? ' WHERE CODVEND = '.$codVenda : '';
    
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo json_encode($row);
        }
    }else{
        echo 'Error: ' .$sql. '<br>'.$conn->error;
    }
 ?>