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
                    Listagem do cadastro de contatos
                </span>
            </div>
            <hr class="hr-separator">
            <div class="row">
                <table class="table table-striped table-hover table-responsive">
                    <thead>
                        <tr>
                            <td style="width: 4%;">#</td>
                            <td style="width: 12%;">Nome</td>
                            <td style="width: 12%;">Endereço</td>
                            <td style="width: 12%;">No. de Endereço</td>
                            <td style="width: 12%;">Complemento</td>
                            <td style="width: 12%;">Bairro</td>
                            <td style="width: 12%;">Cidade</td>
                            <td style="width: 12%;">CEP</td>
                            <td style="width: 12%;">Ações</td>
                        </tr>
                    </thead>
                    <?php
                            $host = "localhost";
                            $user = "root";
                            $password = "";
                        
                            $conexao = mysqli_connect($host, $user, $password);
                        
                            if(!$conexao) {
                                die("Erro de conexão com o servidor mysql");
                            }

                            $sql = "select c.*, d.nome_cidade from agenda.tbl_contatos c inner join agenda.tbl_cidades d on d.id = c.cidade_id";
                            $result = mysqli_query($conexao, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    $id = $row["id"];
                                    echo "<tr>
                                            <td>".$row["id"]."</td>
                                            <td>".utf8_encode($row["nome"])."</td>
                                            <td>".utf8_encode($row["endereco"])."</td>
                                            <td>".$row["nro_endereco"]."</td>
                                            <td>".utf8_encode($row["complemento"])."</td>
                                            <td>".utf8_encode($row["bairro"])."</td>
                                            <td>".utf8_encode($row["nome_cidade"])."</td>
                                            <td>".utf8_encode($row["cep"])."</td>
                                            <td><a href='alt-contato.php?id=$id'><button class='btn btn-primary btn-xs'><i class='fa fa-pencil-alt'></i></button></a> 
                                            &nbsp;&nbsp;<a href='del-contato.php?id=$id'><button class='btn btn-danger btn-xs'><i class='fa fa-trash-alt'></i></button></a></td>
                                          </tr>";
                                }
                            }else {
                                //session_start();
                                $_SESSION["title"] = "Erro";
                                $_SESSION["msg"] = "Não há contatos cadastrados";
                                header("Location: dashboard.php");
                            }

                            mysqli_close($conexao);
                    ?>
                </table>
            </div>
            
        </div>
    </div>

    <?php
        include_once("footer.php");
        include_once("js.php"); ?>
</body>
</html>