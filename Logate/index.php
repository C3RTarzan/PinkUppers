<?php
    session_start();
    include "../class/verificationLogged.php"
?>

<!DOCTYPE html>
<html lang="bt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/index/logate.css">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <title>Logate</title>
</head>

<body>
    <?php
        include "../view/header.php";
    ?>
    <section>
        <div class="logate">
            <div class="login">
                <div class="login-title">
                    <span>Logar</span>
                </div>
                <form action="./login.php" method="post">
                    <div class="input">
                        <input type="text" name="user_login" placeholder="User" required>
                        <input type="password" name="pass_login" placeholder="Senha" required>
                    </div>
                    <div class="button">
                        <div class="button-register">
                            <span class="button-display">Registro</span>
                        </div>
                        <div class="button-login">
                            <button>Logar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="register">
                <div class="register-title">
                    <span>Registrar</span>
                </div>
                <form action="./register.php" method="post">
                    <div class="input">
                        <input type="email" name="email_register" placeholder="Email" autocomplete="email" required>
                        <input type="text" name="user_register" placeholder="User" autocomplete="username" required>
                        <input class="pass" type="password" name="pass1_register" placeholder="Senha" autocomplete="new-password" required>
                        <input class="pass2" type="password" name="pass2_register" placeholder="Repetir Senha" autocomplete="new-password" required>
                    </div>
                    <div class="button">
                        <div class="button-login">
                            <span class="button-display">Logar</span>
                        </div>
                        <div class="button-register">
                            <button>Registrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="/public/js/logate.js"></script>
        <?php
            include "./exceptions.php"
        ?>
    </section>
    <?php
        include "../view/footer.php";
    ?>
</body>
</html>