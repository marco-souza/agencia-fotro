<?php

    // Conexão com BD
    require('connect.php');

    if( isset($_POST) ) {

        // VARS
        $title = utf8_encode($_POST['title']);
        $editoria = utf8_encode($_POST['editoria']);
        $data = utf8_encode($_POST['data']);
        $cobertura = utf8_encode($_POST['cobertura']);
        $licenca = utf8_encode($_POST['licenca']);
        $atividade = utf8_encode($_POST['atividade']);
        $empresa = utf8_encode($_POST['empresa']);
        $endereco = utf8_encode($_POST['endereco']);
        $orientacoes = utf8_encode($_POST['orientacoes']);



        // Inserir Pauta na tabela 'pautas'
        $sql = "INSERT INTO pautas (title, editoria, data, cobertura, licenca, atividade, empresa, endereco, orientacoes)
        VALUES ($title, $editoria, $data, $cobertura, $licenca, $atividade, $empresa, $endereco, $orientacoes)";

        echo $sql;

        if (mysqli_query($conn, $sql)) {
            // SQL Successfully executed
            echo "Adicionado com Sucesso!";
        } else {
            // Query Error
            echo "Error executing query ".$sql.": " . mysqli_error($conn);
        }

    }else{
        echo ("Existe <b>n&atilde;o<b> POST!");
    }
    // INSERT INTO table_name (column1, column2, column3,...)
    // VALUES (value1, value2, value3,...)

    // Create database
    // $sql = "CREATE DATABASE myDB";

    // if (mysqli_query($conn, $sql)) {
    //     // SQL Successfully executed
    //     echo "Database created successfully";
    // } else {
    //     // Query Error
    //     echo "Error executing query ".$sql.": " . mysqli_error($conn);
    // }


    // Fechar Conexão
    // mysqli_close($conn);

?>
