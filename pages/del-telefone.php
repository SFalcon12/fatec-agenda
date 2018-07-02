<?php
    $id = $_GET["id"];

    if(empty($id)) {
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

    $sql = "delete from agenda.tbl_telefones where id = '$id'";
    //echo $sql;
    $result = mysqli_query($conexao, $sql);

    if($result) {
        session_start();
        $_SESSION["title"] = "Sucesso";
        $_SESSION["msg"] = "Telefone deletado";
        header("Location: dashboard.php");
    }