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
                    Registrar Telefone:
                </span>
            </div>
            <hr class="hr-separator">
            <div class="row" style="text-align: center;">
                <p class="register-subtitle">Forneça os dados</p>
            </div>

            <!-- formulario de cadastro de telefone -->
            <form action="grava_telefone.php" method="post" autocomplete="off">

                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fas fa-globe"></span>
                    </span>
                    <select name="contato_id" class="form-control" required>

                        <?php
                                $host = "localhost";
                                $user = "root";
                                $password = "";
                                $database = "agenda";
                            
                                $conexao = mysqli_connect($host, $user, $password);
                            
                                if(!$conexao) {
                                    die("Erro de conexão com o servidor mysql");
                                }

                                $sql = "select * from agenda.tbl_contatos";
                                $result = mysqli_query($conexao, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value=".$row["id"].">".utf8_encode($row["nome"])."</option>";
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
                        aria-describedly="input-tipo-telefone">
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="fas fa-globe"></span>
                    </span>
                    <input type="text" class="form-control" name="num_telefone" pattern="[0-9]{2}-[0-9]{9}" required placeholder="Num. de telefone ex.00-000000000"
                        aria-describedly="input-num-telefone">
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