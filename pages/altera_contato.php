<?php
    $nome_contato = utf8_decode($_POST["nome_contato"]);
    $endereco = utf8_decode($_POST["endereco"]);
    $n_endereco = $_POST["n_endereco"];
    $complemento = utf8_decode($_POST["complemento"]);
    $bairro = utf8_decode($_POST["bairro"]);
    $cidade_id = $_POST["cidade"];
    $cep = $_POST["cep"];
    $id = $_POST["id"];

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

    $conexao = mysqli_connect($host, $user, $password);

    if(!$conexao) {
        die("Erro de conexão com o servidor mysql");
    }

    $sql = "update agenda.tbl_contatos set nome = '$nome_contato', endereco='$endereco', nro_endereco='$n_endereco',
     complemento='$complemento', bairro='$bairro', cidade_id='$cidade_id', cep='$cep' where id = '$id'";
    //echo $sql."<br>";
    $result = mysqli_query($conexao, $sql);
   
    if($result) {
        session_start();
        $_SESSION["title"] = "Sucesso";
        $_SESSION["msg"] = "Contato alterado";
        header("Location: dashboard.php");
        //echo "<a href='login.php'>clique aqui para logar</a>";
    }