<?php
    $nome_contato = utf8_decode($_POST["nome_contato"]);
    $endereco = utf8_decode($_POST["endereco"]);
    $n_endereco = $_POST["n_endereco"];
    $complemento = utf8_decode($_POST["complemento"]);
    $bairro = utf8_decode($_POST["bairro"]);
    $cidade_id = $_POST["cidade"];
    $cep = $_POST["cep"];

    /*
    if(empty($nome_contato)) {
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

    /*
    echo("Nome: ".$nome_usuario."<br>");
    echo("Senha: ".$senha."<br>");
    echo("Email: ".$email."<br>");
    */

    $sql = "insert into agenda.tbl_contatos (nome, endereco, nro_endereco, complemento, bairro, cidade_id, cep) values 
    ('$nome_contato', '$endereco', '$n_endereco','$complemento','$bairro','$cidade_id','$cep')";
    //echo $sql."<br>";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
    }
    header("Location: cad-contato.php");

    session_start();
    $_SESSION["title"] = "Sucesso";
    $_SESSION["msg"] = "Contato registrado";
    header("Location: dashboard.php");