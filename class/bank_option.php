<?php
session_start();
include("./verificationLogin.php");
include("./conexao.php");

date_default_timezone_set('America/Sao_Paulo');

$id = $_SESSION['id'];
$bank = $_POST['bank'];
$choice = $_POST['choice'];

if($choice == 'exit'){

    $query = "select * from bank where user_id = '$id' and agency = '$bank'";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);
    if($row == 1){
        $query = "DELETE FROM bank WHERE agency = '$bank' AND user_id = '$id'";
        $result = mysqli_query($conexao, $query);
        header('Location: /Account/index.php');
        exit();
    }else{
        echo "error";
    }

} else if($choice == 'pencil'){
    $query = "select * from bank where user_id = '$id' and agency = '$bank'";
    $result = mysqli_query($conexao, $query);
    $dado = mysqli_fetch_array($result);
    $row = mysqli_num_rows($result);
    if($row == 1){
        $id_bank = $dado['id'];
        $balance = $dado['balance'];
        $value = 500;
        if($balance >= $value){
            function generateRandomStringPass($size = 8){
                $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuwxyz0123456789";
                $randomString = '';
                for($i = 0; $i < $size; $i = $i+1){
                    $randomString .= $chars[mt_rand(0,8)];
                }
                return $randomString;
            }
            while(true){
                $account = rand(100000,999999). "-". rand(1, 9);
                $agency = $dado['agency'];
                $query= "select * from bank where account = '$account' and agency = '$agency'";
                $result = mysqli_query($conexao, $query);
                $row = mysqli_num_rows($result);
                if($row == 0){
                    break;
                }
            }
            $pass = generateRandomStringPass();
    
            $query_update = "UPDATE bank SET pass = '$pass', account = '$account' WHERE id = '$id_bank'";
            $result_update = mysqli_query($conexao, $query_update);

            $update_value = $balance - $value;
            $query = "UPDATE bank SET balance = '$update_value' WHERE user_id = '$id' and agency = '$agency'";
            $result = mysqli_query($conexao, $query);

            $date = date('Y-m-d');
            $query = "UPDATE bank SET date = '$date' WHERE user_id = '$id' and agency = '$agency'";
            $result = mysqli_query($conexao, $query);

            header('Location: /Account/index.php');
            exit();
        }else{
            $_SESSION['balance_vps'] = true;
            header('Location: ../Account/index.php');
            exit();
        }
    }else{
        echo "error";
    }
}

?>