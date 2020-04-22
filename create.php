<?php
    //Rota API: http://localhost/atvAula6/create.php?tabela=vendedor&nome-vendedor=nomeVend&salario=salario&cod-setor=codSetor
    include_once('./API/api.php');

     if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $tabela = filter_input(INPUT_GET, 'tabela', FILTER_SANITIZE_SPECIAL_CHARS);
        $nomeVend = isset($_GET['nome-vendedor'])
                    ? filter_input(INPUT_GET, 'nome-vendedor', FILTER_SANITIZE_SPECIAL_CHARS)
                    : '';
        $salario = isset($_GET['salario'])
                    ? filter_input(INPUT_GET, 'salario', FILTER_SANITIZE_SPECIAL_CHARS)
                    : '';
        $codSetor = isset($_GET['cod-setor'])
                    ? filter_input(INPUT_GET, 'cod-setor', FILTER_SANITIZE_SPECIAL_CHARS)
                    : '';
    }

    $sql = 'INSERT INTO '.$tabela.'(NOMEVEND, SALARIO, CODSETOR)';
    $sql .= 'VALUES (?, ?, ?)';
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sii', $nomeVend, $salario, $codSetor);

    $stmt->execute();

    if($stmt->execute() === TRUE){
        echo 'Novo registro inserido';
    }else{
        echo 'Error: '.$sql.'<br>'.$conn->error;
    } 
 ?>