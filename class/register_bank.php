<?php

$id = $dado['id'];


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
    $account = rand(100000,999999). "-". rand(1, 9);
    $agency = rand(1000,9999);
    $query= "select * from bank where account = '$account' and agency = '$agency'";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);
    if($row == 0){
        break;
    }
}

$pass = generateRandomStringPass();
$date = date('Y-m-d');

$balance = 0;
$query_bank_create = "INSERT into bank (user_id, account, agency, balance, date, pass) VALUES ('$id', '$account', '$agency', '$balance', '$date', '$pass')";
$result_bank_create = mysqli_query($conexao, $query_bank_create);


?>