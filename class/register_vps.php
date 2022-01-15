<?php

$id = $dado['id'];

$size = 8;
$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuwxyz0123456789";
$randomString = '';
for($i = 0; $i < $size; $i = $i+1){
    $randomString .= $chars[mt_rand(0,8)];
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

$date = "----";
$login_user = $randomString;
$login_pass = rand(10000000,99999999);
$status = "Online";
$query_vps_create = "INSERT into vps (user_id, status, ip, login_user, login_pass, date) VALUES ('$id', '$status', '$ip', '$login_user', '$login_pass', '$date')";
$result_vps_create = mysqli_query($conexao, $query_vps_create);


?>