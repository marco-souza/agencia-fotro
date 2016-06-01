<?php

    // Conexão com BD
    require('connect.php');

    if( isset($_POST['cobertura']) ) {
        echo ("Existe POST! ".$_POST['cobertura']);
    }else{
        echo ("Existe <b>não<b> POST!");
    }


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
