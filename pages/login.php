<!DOCTYPE html>
<html lang="pt_br">
<head>
    <?php include_once("header.php"); ?>
</head>
<body class="back-page-register">
    <?php include_once("nav.php"); ?>

    <div class="register-box">
        <div class="register-box-body">
            <div class="row" style="text-align: center;">
                <span class="register-title">
                    Sistema de Agenda:
                </span>
            </div>
            <hr class="hr-separator">
            <div class="row" style="text-align: center;">
                <p class="register-subtitle">Forneça as credenciais</p>
            </div>

            <!-- formulario de login -->
            <form action="login_user.php" method="post" autocomplete="off">
                <div class="input-group">
                    <span class="input-group-addon" id="input-email">
                        <span class="fas fa-email"></span>
                    </span>
                    <input type="email" autocomplete="off" class="form-control" name="email" required placeholder="Email"
                        aria-describedly="input-email">
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon" id="input-user-name">
                        <span class="fas fa-asterisk"></span>
                    </span>
                    <input type="password" autocomplete="off" class="form-control" name="password" required placeholder="Senha"
                        aria-describedly="input-password">
                </div>
                <br>

                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            <span class="fas fa-lock"></span>
                            Logar
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