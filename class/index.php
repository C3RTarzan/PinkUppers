<?php
    session_start();
    include("../class/verificationLogin.php");
    include("../class/conexao.php");
    if($_SESSION['office'] != "admin"){
        header('Location: /index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/index/class-index.css">
    <title>Admin</title>
</head>
<body>
    <div class="balance bc">
        <form action="./admin.php" method="post">
            <span>Banco</span>
            <input type="number" name="balance" placeholder="Saldo">
            <button>Enviar</button>
        </form>
    </div>
    <div class="vps bc">
        <form action="./admin.php" method="post">
            <span>VPS</span>
            <input type="text" name="maturity" placeholder="Data">
            <button>Enviar</button>
        </form>
    </div>
    <div class="exit">
        <a href="../index.php">Sair</a>
    </div>
</body>
</html>