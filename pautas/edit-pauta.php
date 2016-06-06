<?php

if( isset($_POST) ) {

// VARS
    $id = ($_POST['id']);
    if ($id  == '') {
        $erro = 1;
    }
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
        header("Location: http://www.fotro.com.br/pautas/lista-pautas.php");
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

    // UPDATE Pauta na tabela 'pautas'
    $sql = "UPDATE pautas
    SET title='$title', editoria='$editoria', data='$data', cobertura='$cobertura', licenca='$licenca', atividade='$atividade', empresa='$empresa', endereco='$endereco', orientacoes='$orientacoes'
    WHERE id='". $id ."'";

    if (mysqli_query($conn, $sql)) {

        // Sucesso
        include('success-edit.html'); // Tela de Sucesso
        // header("Location: http://www.fotro.com.br/pautas");

    } else {

        // Erro na query
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

// Fechar Conexão
    mysqli_close($conn);

}else{
    // Sem post
    header("Location: http://www.fotro.com.br/pautas/lista-pautas.php");
}



?>
