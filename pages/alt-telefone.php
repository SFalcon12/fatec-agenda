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
                    Alterar Telefone:
                </span>
            </div>
            <hr class="hr-separator">
            <div class="row" style="text-align: center;">
                <p class="register-subtitle">Forneça os dados</p>
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

                $sql = "select * from agenda.tbl_telefones where id= $id";
                $result = mysqli_query($conexao, $sql);

                $row = mysqli_fetch_array($result);

            ?>

            <!-- formulario de cadastro de telefone -->
            <form action="altera_telefone.php" method="post" autocomplete="off">
                
            <input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fas fa-globe"></span>
                    </span>
                    <select name="contato_id" class="form-control" required>

                        <?php

                            $sql = "select * from agenda.tbl_contatos";
                            $result = mysqli_query($conexao, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while($row2 = mysqli_fetch_assoc($result)) {

                                    if($row["contato_id"] == $row2["id"]) {
                                        echo "<option value=".$row2["id"]." selected>".utf8_encode($row2["nome"])."</option>";
                                    }else{
                                        echo "<option value=".$row2["id"].">".utf8_encode($row2["nome"])."</option>";
                                    }
                                }
                            }else {
                                session_start();
                                $_SESSION["title"] = "Erro";
                                $_SESSION["msg"] = "Não há contatos cadastrados";
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
                    <input type="text" class="form-control" name="tipo_telefone" required placeholder="Tipo de Telefone"
                        aria-describedly="input-tipo-telefone" value="<?php echo utf8_encode($row["tipo_telefone"]); ?>">
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fas fa-globe"></span>
                    </span>
                    <input type="text" class="form-control" name="num_telefone" pattern="[0-9]{2}-[0-9]{9}" required placeholder="Num. de telefone ex.00-000000000"
                        aria-describedly="input-num-telefone" value="<?php echo $row["nro_telefone"]; ?>">
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
        </div>
    </div>

    <?php
        include_once("footer.php");
        include_once("js.php"); ?>
</body>
</html>