<?php

// check BD
function checkPautas($sql ){
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

    // Get Result of query
    $sql = "SELECT id, data, title, editoria, empresa FROM pautas";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {


        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            echo "
            <tr>
            <td>" . $row["data"]. "</td>
            <td>" . $row["title"]. "</td>
            <td>" . $row["editoria"]. "</td>
            <td>" . $row["empresa"]. "</td>
            <td>
            <input type="button" name="edit" class="btn btn-primary" value="Editar">
            <input type="button" name="del" class="btn btn-danger" value="Remover">
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
