<?php 
    $nome_usuario = trim($_POST["user"]);
    $senha = trim($_POST["password"]);

    if(empty($nome_usuario)) {
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

    $sql = "select * from agenda.tbl_usuarios where nome_usuario = '$nome_usuario' and senha = '$senha' limit 1";

    $result = mysqli_query($conexao, $sql);
    $num_resgistros = mysqli_num_rows($result);

    if($num_resgistros == 0){
        echo "
        <script>
            alert('Usuario não encontrado');
        </script>
        ";
        //header("Location: login.php");
    }

    echo "Dados corretos";
    header("Location: dashboard.php");
    
    ?>

