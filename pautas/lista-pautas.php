<?php

    require("utils.php");

    if ( isset($_GET['id']) ) {

        // Deletar
        if ( $_GET['a'] == 'r' ) {
            deleteData('pautas', "id='".$_GET['id']."' ");
        }

    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./style.css">

    <title>Fotro - Pautas</title>
</head>
<body>

    <div id="header"><img src="http://i.imgur.com/tjgz2Tk.png" alt=""></div>


    <div id="pauta">

        <div id="path">
            <h2>Lista de Pautas</h2>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Título</th>
                    <th>Editoria</th>
                    <th>Empresa</th>
                    <th>Alterar</th>
                </tr>
            </thead>

            <tbody>
                <?php checkPautas() ?>
            </tbody>
        </table>

    </div>
</body>
</html>
