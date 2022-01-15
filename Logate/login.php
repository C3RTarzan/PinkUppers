<?php 
session_start();
include("../class/conexao.php");

if(empty($_POST["user_login"] || empty($_POST["pass_login"]))){
    $_SESSION['white_fields_login'] = true;
    header('Location: index.php');
    exit();
}

$user = mysqli_real_escape_string($conexao, trim($_POST["user_login"]));
$pass = mysqli_real_escape_string($conexao, trim($_POST["pass_login"]));
$passMD5 = MD5($pass);

$query = "select * from account where user = '{$user}' and pass = '{$passMD5}'"; //consulta com bd

$result = mysqli_query($conexao, $query); // juntas os 2
$dado = mysqli_fetch_array($result); // extrair dados da tabela sql
$row = mysqli_num_rows($result); // verificar se existe uma linha

if($row > 0){
    include "../class/webCreateSession.php";
    header('Location: ../Account/index.php');
    exit();
}else{
    $_SESSION['login_failed'] = true;
    header('Location: index.php');
    exit();
}





?>