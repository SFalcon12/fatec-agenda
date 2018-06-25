<?php
    $contato_id = $_POST["contato_id"];
    $tipo_telefone = utf8_decode($_POST["tipo_telefone"]);
    $num_telefone  = $_POST["num_telefone"];

    /*
    if(empty($nome_cidade)) {
        $erros = "Campo nome da cidade esta vazio.<br>";
    }*/

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

    $sql = "insert into agenda.tbl_telefones (contato_id, tipo_telefone, nro_telefone) values ('$contato_id', '$tipo_telefone', '$num_telefone')";
    //echo $sql;
    $result = mysqli_query($conexao, $sql);

    session_start();
    $_SESSION["title"] = "Sucesso";
    $_SESSION["msg"] = "Telefone registrado";
    header("Location: dashboard.php");