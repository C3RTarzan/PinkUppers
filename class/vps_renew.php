<?php
session_start();
include("./verificationLogin.php");
include("./conexao.php");
$id = $_SESSION['id'];

$ip = $_POST['renew'];
$value = 500;
$bank = $_POST['bankSelect'];

$query = "select * from bank where user_id = '$id' and agency = '$bank'";
$result = mysqli_query($conexao, $query);
$dado = mysqli_fetch_array($result);
$balance = $dado['balance'];

if($balance < $value){
    $_SESSION['balance_vps'] = true;
    header('Location: ../Account/index.php');
    exit();
}else{
    date_default_timezone_set('America/Sao_Paulo');
    $date = strtotime(date('Y-m-d')) + 2592000;
    $date = date('Y-m-d', $date);
    $update_value = $balance - $value;
    $query = "UPDATE bank SET balance = '$update_value' WHERE user_id = '$id' and agency = '$bank'";
    $result = mysqli_query($conexao, $query);
    $query = "UPDATE vps SET date = '$date' WHERE user_id = '$id' and ip = '$ip'";
    $result = mysqli_query($conexao, $query);
    header('Location: ../Account/index.php');
    exit();
}
?>