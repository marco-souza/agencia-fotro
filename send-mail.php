<?PHP
        // Página de retorno
        $home = "http://127.0.0.1:4000/";

        // informações de email
        $to = "ma.souza.junior@gmail.com";
        $headers = "From: ";
        if ( isset($_GET['email']) ) {
            $headers .= $_GET['email'];
            $headers .= '\r\n';
        }

        // Assunto
        $subject = 'Você recebeu uma mensagem';
        if ( isset($_GET['name']) ) {
                $name = $_GET['name'];
                $subject .= ' de '.$name;
        }
        $subject .= '!';

        // Mensagem
        if ( isset($_GET['msg']) )
                $msg = $_GET['msg'];

        // Enviar email
        if (mail($to, $subject, $msg, $headers))
                // Sucesso
                header("Location: ".$home."?res=0");
        else
                // Fail
                header("Location: ".$home."?res=1");

?>
