<!DOCTYPE html>
<html lang="pt_br">
<head>
    <?php include_once("header.php"); ?>
</head>
<body class="back-page-register">
    <?php include_once("nav-dashboard.php"); 
        ob_start();?>

    <div class="register-box">
        <div class="register-box-body">
            <div class="row" style="text-align: center;">
                <span class="register-title">
                    Registrar Contato:
                </span>
            </div>
            <hr class="hr-separator">
            <div class="row" style="text-align: center;">
                <p class="register-subtitle">Forneça os dados</p>
            </div>

            <!-- formulario de cadastro de cidade -->
            <form action="grava_contato.php" method="post" autocomplete="off">

                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fas fa-globe"></span>
                    </span>
                    <input type="text" class="form-control" name="nome_contato" required placeholder="Nome do contato"
                        aria-describedly="input-nome-contato">
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fas fa-globe"></span>
                    </span>
                    <input type="text" class="form-control" name="endereco" required placeholder="Endereço do contato"
                        aria-describedly="input-endereco">
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fas fa-globe"></span>
                    </span>
                    <input type="number" class="form-control" name="n_endereco" required placeholder="Num. do Endereço"
                        aria-describedly="input-n_endereco">
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fas fa-globe"></span>
                    </span>
                    <input type="text" class="form-control" name="complemento" required placeholder="Complemento"
                        aria-describedly="input-complemento">
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fas fa-globe"></span>
                    </span>
                    <input type="text" class="form-control" name="bairro" required placeholder="Bairro"
                        aria-describedly="input-bairro">
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fas fa-globe"></span>
                    </span>
                    <select name="cidade" class="form-control" required>

                        <?php
                                $host = "localhost";
                                $user = "root";
                                $password = "";
                                $database = "agenda";
                            
                                $conexao = mysqli_connect($host, $user, $password);
                            
                                if(!$conexao) {
                                    die("Erro de conexão com o servidor mysql");
                                }

                                $sql = "select * from agenda.tbl_cidades";
                                $result = mysqli_query($conexao, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value=".$row["id"].">".utf8_encode($row["nome_cidade"])."</option>";
                                    }
                                } else {
                                    session_start();
                                    $_SESSION["title"] = "Erro";
                                    $_SESSION["msg"] = "Não há cidades cadastrados";
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
                        aria-describedly="input-cep">
                </div>
                <br>

                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            <span class="fas fa-lock"></span>
                            Registrar
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