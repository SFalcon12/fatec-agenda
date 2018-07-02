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
                    Registrar Cidade:
                </span>
            </div>
            <hr class="hr-separator">
            <div class="row" style="text-align: center;">
                <p class="register-subtitle">Forneça as credenciais</p>
            </div>

            <!-- formulario de cadastro de cidade -->
            <form action="grava_cidade.php" method="post" autocomplete="off">
                <div class="input-group">
                    <span class="input-group-addon" id="input-user-name">
                        <span class="fas fa-globe"></span>
                    </span>
                    <input type="text" class="form-control" name="nome_cidade" required placeholder="Nome da cidade"
                        aria-describedly="input-nome-cidade">
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon" id="input-user-name">
                        <span class="fas fa-globe"></span>
                    </span>
                    <select name="estado" class="form-control">
                        <option value="SP">São Paulo</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="RS">Rio Grande do Sul</option>
                    </select>
                </div>
                <br>

                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            <span class="fas fa-lock"></span>
                            Inserir
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