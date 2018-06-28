<?php
    $nome_cidade = utf8_decode($_POST["nome_cidade"]);
    $estado  = $_POST["estado"];

    if(empty($nome_cidade)) {
        $erros = "Campo nome da cidade esta vazio.<br>";
    }

    if(!empty($erros)) {
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

    $sql = "insert into agenda.tbl_cidades (nome_cidade, estado) values ('$nome_cidade', '$estado')";
    //echo $sql;
    $result = mysqli_query($conexao, $sql);

    if($result) {
        session_start();
        $_SESSION["title"] = "Sucesso";
        $_SESSION["msg"] = "Cidade registrada";
        header("Location: dashboard.php");
        //echo "<a href='login.php'>clique aqui para logar</a>";
    }