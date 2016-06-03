<?php

// Dados Conexão
$servername = "mysql.hostinger.com.br";
$username = "u411818826_admin";
$password = "PjS3LZwzN9vr";
$dbname = "u411818826_site";


function deleteData($table, $where, $redirect ) {
    // Import global vars
    global $servername, $username, $password, $dbname;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // sql to delete a record
    $sql = "DELETE FROM ".$table." WHERE ".$where;

    if ($conn->query($sql) === TRUE) {
        // popup msg
        echo "
        <script>
            alert('Registro deletado com Sucesso!');
        </script>";

        // Redirect
        header("location:".$redirect."");


    } else {
        // popup msg
        echo "
        <script>
            alert('Erro ao deletar registro: " . $conn->error."');
        </script>";

    }

    $conn->close();
};

// check BD
function checkPautas( ){

    // Import global vars
    global $servername, $username, $password, $dbname;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get Result of query
    $sql = "SELECT id, data, title, editoria, empresa FROM pautas";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {


        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
            <td>" . date_format(date_create($row["data"]), 'd/m/Y H:i'). "</td>
            <td>" . $row["title"]. "</td>
            <td>" . $row["editoria"]. "</td>
            <td>" . $row["empresa"]. "</td>
            <td>
            <a href='?a=e&id=".$row["id"]."' name='edit' class='btn btn-link'>Edit</a>
            <a href='?a=r&id=".$row["id"]."' onclick='return confirm(\"Tem ceteza?\");' name='del' class='btn btn-danger'>Del</a>
            </td>
            </tr>
            ";
        }
    } else {
        echo "0 results";
    }

    // Fechar Conexão
    mysqli_close($conn);
}
?>
