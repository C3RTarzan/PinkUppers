<?php
session_start();
include("../class/verificationLogin.php");
include("../class/conexao.php");
if($_SESSION['office'] != "admin"){
    header('Location: /index.php');
    exit();
}

$id = $_SESSION['id'];

if(isset($_POST['maturity'])){
    $query_vps = "select * from vps where user_id = '$id'";

    $result_vps = mysqli_query($conexao, $query_vps);
    $dado_vps = mysqli_fetch_array($result_vps);
    $row_vps = mysqli_num_rows($result_vps);

    if($row_vps < 1000){ 
        date_default_timezone_set('America/Sao_Paulo');
        function generateRandomStringPass($size = 8){
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuwxyz0123456789";
            $randomString = '';
            for($i = 0; $i < $size; $i = $i+1){
            $randomString .= $chars[mt_rand(0,8)];
            }
            return $randomString;
        }
        while(true){
            $gameIP1 = rand(0, 255);
            $gameIP2 = rand(0, 255);
            $gameIP3 = rand(0, 255);
            $gameIP4 = rand(0, 255);
            $ip = $gameIP1 . '.' . $gameIP2 . '.' . $gameIP3 . '.' . $gameIP4;
            $query_vps_ip = "select * from vps where ip = '$ip'";
            $result_vps_ip = mysqli_query($conexao, $query_vps_ip);
            $row_vps_ip = mysqli_num_rows($result_vps_ip);
            if($row_vps_ip == 0){
                break;
            }
        }
        
        if($_POST['maturity'] == ''){
            $date = date('Y-m-d');
        }else{
            $date = $_POST['maturity'];
        }
        $login_user = generateRandomStringPass();
        $login_pass = rand(10000000,99999999);
        $status = "Online";
        $query_vps_create = "INSERT into vps (user_id, status, ip, login_user, login_pass, date) VALUES ('$id', '$status', '$ip', '$login_user', '$login_pass', '$date')";
        $result_vps_create = mysqli_query($conexao, $query_vps_create);
    }
}

if(isset($_POST['balance'])){
    $id = $_SESSION['id'];
    
    $query_bank = "select * from bank where user_id = '$id'";
    
    $result_bank = mysqli_query($conexao, $query_bank);
    $dado_bank = mysqli_fetch_array($result_bank);
    $row_bank = mysqli_num_rows($result_bank);
    
    if($row_bank < 1000){ 
        date_default_timezone_set('America/Sao_Paulo');
        function generateRandomStringPasss($size = 8){
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuwxyz0123456789";
            $randomString = '';
            for($i = 0; $i < $size; $i = $i+1){
               $randomString .= $chars[mt_rand(0,8)];
            }
            return $randomString;
        }
        $pass = generateRandomStringPasss();
        $date = date('Y-m-d');
        $account = rand(100000,999999). "-". rand(1, 9);
        $agency = rand(1000,9999);
        if($_POST['balance'] == ''){
            $balance = 0;  
        }else{
            $balance = $_POST['balance'];
        }
        $query_bank_create = "INSERT into bank (user_id, account, agency, balance, date, pass) VALUES ('$id', '$account', '$agency', '$balance', '$date', '$pass')";
        $result_bank_create = mysqli_query($conexao, $query_bank_create);
    }
}

header('Location: ./index.php');

?>