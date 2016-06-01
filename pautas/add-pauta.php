<?php

if( isset($_POST) ) {

// VARS
    $title = ($_POST['title']);
    if ($title  == '') {
        $erro = 1;
    }
    $editoria = ($_POST['editoria']);
    if ($editoria  == '') {
        $erro = 1;
    }
    $data = ($_POST['data']);
    if ($data  == '') {
        $erro = 1;
    }
    $cobertura = ($_POST['cobertura']);
    if ( $cobertura == '') {
        $erro = 1;
    }
    $licenca = ($_POST['licenca']);
    if ( $licenca == '') {
        $erro = 1;
    }
    $atividade = ($_POST['atividade']);
    if ( $atividade == '') {
        $erro = 1;
    }
    $empresa = ($_POST['empresa']);
    if ( $empresa == '') {
        $erro = 1;
    }
    $endereco = ($_POST['endereco']);
    if ( $endereco == '') {
        $erro = 1;
    }

    $orientacoes = ($_POST['orientacoes']); // Não obrigatório

    // Verificação de erro
    if ($erro == 1) {
        header("Location: http://www.fotro.com.br/pautas");
        die();
    }

// Abrindo Conexão
    $servername = "localhost";
    $username = "u411818826_admin";
    $password = "PjS3LZwzN9vr";
    $dbname = "u411818826_site";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Inserir Pauta na tabela 'pautas'
    $sql = "INSERT INTO pautas (title, editoria, data, cobertura, licenca, atividade, empresa, endereco, orientacoes)
    VALUES ('$title', '$editoria', '$data', '$cobertura', '$licenca', '$atividade', '$empresa', '$endereco', '$orientacoes')";

    if (mysqli_query($conn, $sql)) {

        // Sucesso
        include('success.html'); // Tela de Sucesso
        sleep(5);
        header("Location: http://www.fotro.com.br/pautas");

    } else {

        // Erro na query
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

// Fechar Conexão
    mysqli_close($conn);

}else{
    // Sem post
    header("Location: http://www.fotro.com.br/pautas");
}



?>
