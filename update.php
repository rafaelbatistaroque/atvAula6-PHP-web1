<?php
    //Rota API: http://localhost/atvAula6/update.php?tabela=vendedor&nome-vendedor=nomeVend&salario=salario&cod-setor=codSetor&cod-venda=id
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
        $codVenda = isset($_GET['cod-venda'])
                    ? filter_input(INPUT_GET, 'cod-venda', FILTER_SANITIZE_SPECIAL_CHARS)
                    : '';
    }


    $sql = 'UPDATE '.$tabela.' SET';
    $sql .= ' NOMEVEND = ?, SALARIO = ?, CODSETOR = ?';
    $sql .= ' WHERE CODVEND = ?';
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('siii', $nomeVend, $salario, $codSetor, $codVenda);

    $stmt->execute();

    if($stmt->execute() === TRUE){
        echo 'Registro atualizado';
    }else{
        echo 'Error: '.$sql.'<br>'.$conn->error;
    } 
 ?>