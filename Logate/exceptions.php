<?php if(isset($_SESSION["white_fields_login"])): ?>
    <span class="msg">Preencha todos os campos!!</span>
<?php
    endif;
    unset($_SESSION['white_fields_login']); 
?>

<?php if(isset($_SESSION["login_failed"])): ?>
    <span class="msg">Usuário e/ou senha inválidos.</span>
<?php
    endif;
    unset($_SESSION['login_failed']); 
?>

<?php if(isset($_SESSION["white_fields"])): ?>
    <span class="msg">Preencha todos os campos!!</span>
    <script>
        $click = document.querySelectorAll(".button-display");
        $click[1].click();
    </script>
<?php
    endif;
    unset($_SESSION['white_fields']); 
?>

<?php if(isset($_SESSION["password_match"])): ?>
    <span class="msg">Senhas não correspondem</span>
    <script>
        $click = document.querySelectorAll(".button-display");
        $click[1].click();
    </script>
<?php
    endif;
    unset($_SESSION['password_match']); 
?>

<?php if(isset($_SESSION["insufficient_characters"])): ?>
    <span class="msg">Sua senha deve ter no minimo 8 caracteres.</span>
    <script>
        $click = document.querySelectorAll(".button-display");
        $click[1].click();
    </script>
<?php
    endif;
    unset($_SESSION['insufficient_characters']); 
?>

<?php if(isset($_SESSION["existing_user"])): ?>
    <span class="msg">Usúario já existe, tente usar outro.</span>
    <script>
        $click = document.querySelectorAll(".button-display");
        $click[1].click();
    </script>
<?php
    endif;
    unset($_SESSION['existing_user']); 
?>

<?php if(isset($_SESSION["existing_email"])): ?>
    <span class="msg">E-Mail já existe, tente usar outro.</span>
    <script>
        $click = document.querySelectorAll(".button-display");
        $click[1].click();
    </script>
<?php
    endif;
    unset($_SESSION['existing_email']); 
?>

<?php if(isset($_SESSION["successful_registration"])): ?>
    <span class="msg">Usúario registrado.</span>
<?php
    endif;
    unset($_SESSION['successful_registration']); 
?>