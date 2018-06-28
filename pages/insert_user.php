<?php 
    $nome_usuario = trim(utf8_decode($_POST["user"]));
    $senha = trim(utf8_decode($_POST["password"]));
    $email = trim(utf8_decode($_POST["email"]));
    
    if(empty($nome_usuario)) {
        $erros = "Campo nome do usuário esta vazio.<br>";
    }

    if(empty($senha)) {
        $erros = "Campo senha esta vazio.<br>";
    }

    if(empty($email)) {
        $erros = "Campo email esta vazio.<br>";
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

    /*
    echo("Nome: ".$nome_usuario."<br>");
    echo("Senha: ".$senha."<br>");
    echo("Email: ".$email."<br>");
    */

    $sql = "insert into agenda.tbl_usuarios (nome_usuario, senha, email) values ('$nome_usuario', '$senha', '$email')";
    //echo $sql;
    $result = mysqli_query($conexao, $sql);
    header("Location: login.php");
    //echo "<a href='login.php'>clique aqui para logar</a>";