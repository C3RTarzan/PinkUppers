<?php 
session_start();
include("../class/conexao.php");

if(empty($_POST["user_register"]) || empty($_POST["email_register"]) || empty($_POST["pass1_register"]) || empty($_POST["pass2_register"])){
    $_SESSION['white_fields'] = true;
    header('Location: index.php');
    exit();
}
if($_POST["pass1_register"] != $_POST["pass2_register"]){
    $_SESSION['password_match'] = true;
    header('Location: index.php');
    exit();
}

if($_POST['pass1_register'] == '' || $_POST['pass2_register'] == '' ){
    $_SESSION['white_fields'] = true;
    header('Location: index.php');
    exit();
}
if(strlen($_POST['pass1_register']) < 8 ){
    $_SESSION['insufficient_characters'] = true;
    header('Location: index.php');
    exit();
}

$user = mysqli_real_escape_string($conexao, trim($_POST["user_register"]));
$email = mysqli_real_escape_string($conexao, trim($_POST["email_register"]));
$pass = mysqli_real_escape_string($conexao, trim($_POST["pass1_register"]));
$passMD5 = MD5($pass);

$query_verificar = "select * from account where user = '$user'";
$result_verificar = mysqli_query($conexao, $query_verificar);
$row_verificar = mysqli_num_rows($result_verificar); 
if($row_verificar > 0){
    $_SESSION['existing_user'] = true;
    header('Location: index.php'); 
    exit();
} 

$query_verificar = "select * from account where email = '$email'";
$result_verificar = mysqli_query($conexao, $query_verificar);
$row_verificar = mysqli_num_rows($result_verificar); 
if($row_verificar > 0){
    $_SESSION['existing_email'] = true;
    header('Location: index.php'); 
    exit();
} 

$query = "INSERT into account (user, pass, email, office) VALUES ('$user', '$passMD5', '$email', 'user')";
$result = mysqli_query($conexao, $query);

if($result == ''){
    echo "<script language='javascript' type='text/javascript'>alert('O usuario não foi cadastrado!')</script>";
}else{
    $_SESSION['successful_registration'] = true;

    $query = "select * from account where user = '{$user}' and pass = '{$passMD5}'"; 
    $result = mysqli_query($conexao, $query);
    $dado = mysqli_fetch_array($result);
    include "../class/register_bank.php";
    include "../class/register_vps.php";
    include "../class/register_status.php";

    header('Location: index.php');
}
?>