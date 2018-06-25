<!DOCTYPE html>
<html lang="pt_br">
<head>
    <?php
        include_once('header.php');
        session_start();
    ?>
</head>

<body class="back-page" onload="showMessage('<?php echo $_SESSION["title"] ?>', '<?php echo $_SESSION["msg"]; ?>');">

     <?php
        include_once('nav-dashboard.php');
        include_once('footer.php');
        include_once('js.php');
    ?>
</body>
</html>