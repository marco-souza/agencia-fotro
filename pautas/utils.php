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
    $sql = "SELECT * FROM pautas";
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
            <a href='#' name='edit' class='btn btn-link' data-toggle='modal' data-target='#myModal-" . $row["id"]. "'> <i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i> </a>
            <a href='?a=r&id=".$row["id"]."' onclick='return confirm(\"Tem ceteza?\");' name='del' class='btn btn-danger'> <i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i> </a>
            </td>
            </tr>

            <!-- Modal -->
            <div class='modal fade' id='myModal-" . $row["id"]. "' role='dialog'>
              <div class='modal-dialog'>

                <!-- Modal content-->
                <div class='modal-content'>

                  <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'>Editar - " . $row["title"]. "</h4>
                  </div>

                  <div class='modal-body'>
                      <form action='edit-pauta.php' method='post'>

                          <!-- Titulo -->
                          <div class='form-group  col-lg-12'>
                              <label for='title'>Título </label>
                              <input class='form-control' type='text' id='title' name='title' required='true'/ value='" . $row["title"]. "'>
                          </div>

                          <!-- Editoria -->
                          <div class='form-group  col-lg-6'>
                              <label for='editoria'>Editoria</label>
                              <select class='form-control' name='editoria' id='editoria' value='" . $row["editoria"]. "'>
                                  <option value='Cultura'>Cultura</option>
                                  <option value='Arte'>Arte</option>
                                  <option value='Esporte'>Esporte</option>
                                  <option value='Ciência e Saúde'>Ciência e Saúde</option>
                                  <option value='Politica'>Politica</option>
                                  <option value='Tecnologia'>Tecnologia</option>
                                  <option value='Tempo e trânsito'>Tempo e trânsito</option>
                                  <option value='Social'>Social</option>
                                  <option value='Internacional'>Internacional</option>
                                  <option value='Cotidiano'>Cotidiano</option>
                              </select>
                          </div>

                          <!-- Data e Hora  -->
                          <div class='form-group  col-lg-6'>
                              <label for='data'>Data e Hora</label>
                              <input class='form-control' type='datetime-local' id='data' name='data' required='true' value=' " . date_format(date_create($row["data"]), 'YYYY-MM-DDThh:mm'). " '>
                          </div>

                          <!-- Cobertura -->
                          <div class='form-group  col-lg-6'>
                              <label for='cobertura'>Cobertura</label>
                              <select class='form-control' name='cobertura' id='cobertura' value " . $row["cobertura"]. ">
                                  <option value='Jornalistico'>Jornalistico</option>
                                  <option value='Social'>Social</option>
                                  <option value='Editorial'>Editorial</option>
                              </select>
                          </div>

                          <!-- Licensa -->
                          <div class='form-group  col-lg-6'>
                              <label for='licenca'>Licença Padrão </label>
                              <select class='form-control' name='licenca' id='licenca' value='" . $row["licenca"]. "'>
                                  <option value='Venda'>Venda</option>
                                  <option value='Divulgação'>Divulgação</option>
                              </select>
                          </div>

                          <!-- Atividade -->
                          <div class='form-group  col-lg-6'>
                              <label for='atividade'>Atividade </label>
                              <input class='form-control' type='text' id='atividade' name='atividade' required='true' value='" . $row["atividade"]. "'>

                          </div>

                          <!-- Empresa -->
                          <div class='form-group  col-lg-6'>
                              <label for='empresa'>Empresa </label>
                              <input class='form-control' type='text' id='empresa' name='empresa' required='true' value='" . $row["empresa"]. "'>
                          </div>

                          <!-- Endereço -->
                          <div class='form-group  col-lg-6'>
                              <label for='endereco'>Endereço </label>
                              <!-- <input class='form-control' type='text' id='title' name='title' /> -->
                              <textarea class='form-control' name='endereco' id='endereco' cols='30' rows='10' required='true'>" . $row["endereco"]. "</textarea>
                          </div>

                          <!-- Orientações -->
                          <div class='form-group  col-lg-6'>
                              <label for='orientacoes'>Orientações </label>
                              <textarea class='form-control' name='orientacoes' id='orientacoes' cols='30' rows='10'>" . $row["orientacoes"]. "</textarea>
                          </div>


                          <!-- Salvar -->
                          <div class='form-group  col-lg-12'>
                              <button class='btn' type='submit' style='background: #EFC21E;'>Salvar</button>
                          </div>

                      </form>

                  </div>

                  <div class='modal-footer'>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button>
                  </div>
                </div>

              </div>
            </div>
            ";
        }
    } else {
        echo "0 results";
    }

    // Fechar Conexão
    mysqli_close($conn);
}
?>
