<?php
session_start();
include "./class/verificationLogged.php"
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/index/index.css">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <title>PinkUppers</title>
</head>
<body>

    <?php
        include "./view/header.php"
    ?>

    <section>
        <div class="primary">
            <div class="title">
                <span>Seja Bem-Vindo ao PinkUppers</span>
            </div>
            <div class="info">
                <span>
                    PinkUppers se trata de um simulador de HACKER, 
                    onde você é um hacker e invadira pessoas/empresas e até outros hackers. 
                    mas fique atento pois você também poderá se torar um alvo!!!
                </span>
            </div>
            <div class="img">
                <img src="/public/img/index-1.jpg" alt="">
            </div>
        </div>
    </section>
    
    <?php
        include "./view/footer.php"
    ?>
</body>
</html>