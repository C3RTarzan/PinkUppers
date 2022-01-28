<?php

$query = "select * from vps where user_id = '$id'";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

for($i = 0; $i < $row; $i++){
    $dado = mysqli_fetch_array($result);
    $time = $dado['ipUpdate'];
    $ip = $dado['ip'];
    $status = $dado['status'];
    $date = strtotime(date('Y-m-d H:i:s'));
    if( $time > $date ){
        $query_update = "UPDATE vps SET status = 'Unavailable' WHERE ip = '$ip'";
        $result_update = mysqli_query($conexao, $query_update);
    }elseif($status == 'Unavailable'){
        while(true){
            $gameIP1 = rand(0, 255);
            $gameIP2 = rand(0, 255);
            $gameIP3 = rand(0, 255);
            $gameIP4 = rand(0, 255);
            $ip_update = $gameIP1 . '.' . $gameIP2 . '.' . $gameIP3 . '.' . $gameIP4;
            $query_vps_ip = "select * from vps where ip = '$ip_update'";
            $result_vps_ip = mysqli_query($conexao, $query_vps_ip);
            $row_vps_ip = mysqli_num_rows($result_vps_ip);
            if($row_vps_ip == 0){
                break;
            }
        }
        $query_update = "UPDATE vps SET ip = '$ip_update' WHERE ip = '$ip'";
        $result_update = mysqli_query($conexao, $query_update);
        $query_update = "UPDATE vps SET status = 'Online' WHERE ip = '$ip_update'";
        $result_update = mysqli_query($conexao, $query_update);
        $query_update = "UPDATE vps SET ipUpdate = '0' WHERE ip = '$ip_update'";
        $result_update = mysqli_query($conexao, $query_update);
        $query_update = "UPDATE vps SET ipUpdateStart = '0' WHERE ip = '$ip_update'";
        $result_update = mysqli_query($conexao, $query_update);
    }
}
?>