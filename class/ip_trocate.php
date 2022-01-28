<?php
session_start();
include("./verificationLogin.php");
include("./conexao.php");
date_default_timezone_set('America/Sao_Paulo');

$id = $_SESSION['id'];

$ip = $_POST['trocate'];
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
    $time = strtotime(date(DATE_RFC822)) + 30 * 1;
    $date = strtotime(date(DATE_RFC822));
    $query_update = "UPDATE vps SET ipUpdate = '$time' WHERE ip = '$ip'";
    $result_update = mysqli_query($conexao, $query_update);
    $query_update = "UPDATE vps SET ipUpdateStart = '$date' WHERE ip = '$ip'";
    $result_update = mysqli_query($conexao, $query_update);
    $update_value = $balance - $value;
    $query = "UPDATE bank SET balance = '$update_value' WHERE user_id = '$id' and agency = '$bank'";
    $result = mysqli_query($conexao, $query);
    header('Location: /Account/index.php');
    exit();
}

?>