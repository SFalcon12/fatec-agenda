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
                    Sistema de Agenda:
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

                    $sql = "select * from agenda.tbl_cidades where id= $id";
                    $result = mysqli_query($conexao, $sql);

                    $row = mysqli_fetch_array($result);
                    /*
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                        }
                    }*/

            ?>

            <!-- formulario de cadastro de cidade -->
            <form action="altera_cidade.php" method="post" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-group">
                    <span class="input-group-addon" id="input-user-name">
                        <span class="fas fa-globe"></span>
                    </span>
                    <input type="text" class="form-control" name="nome_cidade" required placeholder="Nome da cidade"
                        aria-describedly="input-nome-cidade" value=<?php echo utf8_encode($row["nome_cidade"]); ?>>
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon" id="input-user-name">
                        <span class="fas fa-globe"></span>
                    </span>
                    <select name="estado" class="form-control">
                        <option value="SP" <?php if($row["estado"]=="SP"){ echo "selected"; } ?>>São Paulo</option>
                        <option value="RJ" <?php if($row["estado"]=="RJ"){ echo "selected"; } ?>>Rio de Janeiro</option>
                        <option value="MG" <?php if($row["estado"]=="MG"){ echo "selected"; } ?>>Minas Gerais</option>
                        <option value="RS" <?php if($row["estado"]=="RS"){ echo "selected"; } ?>>Rio Grande do Sul</option>
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