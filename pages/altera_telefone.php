<?php
    $contato_id = $_POST["contato_id"];
    $tipo_telefone = utf8_decode($_POST["tipo_telefone"]);
    $num_telefone  = $_POST["num_telefone"];
    $id = $_POST["id"];

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

    $sql = "update agenda.tbl_telefones set contato_id = '$contato_id', tipo_telefone = '$tipo_telefone',
     nro_telefone='$num_telefone' where id = '$id'";
    //echo $sql;

    if($result = mysqli_query($conexao, $sql)) {
        session_start();
        $_SESSION["title"] = "Sucesso";
        $_SESSION["msg"] = "Telefone alterado";
        header("Location: dashboard.php");
    }