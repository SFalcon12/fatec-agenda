<!DOCTYPE html>
<html lang="pt_br">
<head>
    <?php include_once("header.php"); ?>
</head>
<body class="back-page-register">
    <?php include_once("nav-dashboard.php"); ?>

    <div class="register-box">
        <div class="register-box-body">
            <div class="row" style="text-align: center;">
                <span class="register-title">
                    Alterar Contato:
                </span>
            </div>
            <hr class="hr-separator">
            <div class="row" style="text-align: center;">
                <p class="register-subtitle">Forneça as credenciais</p>
            </div>

            <?php 
                    $id = $_GET["id"];

                    $host = "localhost";
                    $user = "root";
                    $password = "";
                
                    $conexao = mysqli_connect($host, $user, $password);
                
                    if(!$conexao) {
                        die("Erro de conexão com o servidor mysql");
                    }

                    $sql = "select * from agenda.tbl_contatos where id= $id";
                    $result = mysqli_query($conexao, $sql);

                    $row = mysqli_fetch_array($result);
                    /*
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                        }
                    }*/

            ?>

            <!-- formulario de cadastro de cidade -->
            <form action="altera_contato.php" method="post" autocomplete="off">

                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fas fa-globe"></span>
                    </span>
                    <input type="text" class="form-control" name="nome_contato" required placeholder="Nome do contato"
                        aria-describedly="input-nome-contato" value="<?php echo utf8_encode($row["nome"]); ?>">
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fas fa-globe"></span>
                    </span>
                    <input type="text" class="form-control" name="endereco" required placeholder="Endereço do contato"
                        aria-describedly="input-endereco" value="<?php echo utf8_encode($row["endereco"]); ?>">
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fas fa-globe"></span>
                    </span>
                    <input type="number" class="form-control" name="n_endereco" required placeholder="Num. do Endereço"
                        aria-describedly="input-n_endereco" value="<?php echo $row["nro_endereco"]; ?>">
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fas fa-globe"></span>
                    </span>
                    <input type="text" class="form-control" name="complemento" required placeholder="Complemento"
                        aria-describedly="input-complemento" value="<?php echo utf8_encode($row["complemento"]); ?>">
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fas fa-globe"></span>
                    </span>
                    <input type="text" class="form-control" name="bairro" required placeholder="Bairro"
                        aria-describedly="input-bairro" value="<?php echo utf8_encode($row["bairro"]); ?>">
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fas fa-globe"></span>
                    </span>
                    <select name="cidade" class="form-control" required>

                        <?php

                                $sql = "select * from agenda.tbl_cidades";
                                $result = mysqli_query($conexao, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while($row2 = mysqli_fetch_assoc($result)) {

                                        if($row["cidade_id"] == $row2["id"]) {
                                            echo "<option value=".$row2["id"]." selected>".utf8_encode($row2["nome_cidade"])."</option>";
                                        }else {
                                            echo "<option value=".$row2["id"].">".utf8_encode($row2["nome_cidade"])."</option>";
                                        }
                                        
                                    }
                                } else {
                                    session_start();
                                    $_SESSION["title"] = "Erro";
                                    $_SESSION["msg"] = "Não há cidades cadastradas";
                                    header("Location: dashboard.php");
                                }

                                mysqli_close($conexao);
                        ?>

                    </select>
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fas fa-globe"></span>
                    </span>
                    <input type="text" class="form-control" name="cep" required placeholder="CEP"
                        aria-describedly="input-cep" value="<?php echo utf8_encode($row["cep"]); ?>">
                </div>
                <br>

                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            <span class="fas fa-lock"></span>
                            Alterar
                        </button>
                    </div>
                </div>

            </form>