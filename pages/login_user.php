<?php
    require_once('js.php');
    $email = trim($_POST["email"]);
    $senha = trim($_POST["password"]);

    if(empty($email)) {
        $erros = "Campo nome do usuário esta vazio.<br>";
    }

    if(empty($senha)) {
        $erros = "Campo senha esta vazio.<br>";
    }

    if(!empty($erros)){
        echo "Foram encontradas inconsistencias de dados <br>";
        echo $erros;
        return;
    }

    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "agenda";

    $conexao = mysqli_connect($host, $user, $password);

    if(!$conexao) {
        die("Erro de conexão com o servidor mysql");
    }

    $sql = "select * from agenda.tbl_usuarios where email = '$email' and senha = '$senha' limit 1";

    $result = mysqli_query($conexao, $sql);
    $num_resgistros = mysqli_num_rows($result);

    mysqli_close($conexao);
    if($num_resgistros == 0) {
        echo "
        <script>
            showMessage('Login', 'Usuario não encontrado');
        </script>
        ";
        echo '<meta http-equiv="refresh" content="3;URL=\'login.php\'">';
        //sleep(3);
        //header("Location: login.php");
    }else {

        session_start();
        $_SESSION['user_email'] = $email;
        $_SESSION["title"] = "Sucesso";
        $_SESSION["msg"] = "Usuario logado";
        //echo '<meta http-equiv="refresh" content="1;URL=\'dashboard.php\'">';
        header("Location: dashboard.php");
    }

?>