<?php

$orientacoes = ($_POST['orientacoes']);
if( isset($_POST) ) {

// VARS
    $title = ($_POST['title']);
    $editoria = ($_POST['editoria']);
    $data = ($_POST['data']);
    $cobertura = ($_POST['cobertura']);
    $licenca = ($_POST['licenca']);
    $atividade = ($_POST['atividade']);
    $empresa = ($_POST['empresa']);
    $endereco = ($_POST['endereco']);

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
        // echo "New record created successfully";
        // header('Location: http://www.example.com/');
        include('success.html');

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

// Fechar Conexão
    mysqli_close($conn);

}else{
    // Sem post
    header("Location: www.fotro.com.br/pautas");
}



?>
