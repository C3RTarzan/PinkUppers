<?php
date_default_timezone_set('America/Sao_Paulo');
$query = "select * from vps where user_id = '$id'";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);
for($i = 0; $i < $row; $i++){
    $dado = mysqli_fetch_array($result); 
    $date = $dado['date'];
    $id_update = $dado['id'];
    $status = $dado['status'];

    $date_vps_strtotime = strtotime($date);
    $date_today_strtotime = strtotime(date('Y-m-d'));


    //$newDate = date("m-d-Y", $timestamp );

    if($date == '----'){
        $query_update = "UPDATE vps SET status = 'Online' WHERE id = '$id_update'";
        $result_update = mysqli_query($conexao, $query_update);
    }elseif($date_vps_strtotime >= $date_today_strtotime){
        $query_update = "UPDATE vps SET status = 'Online' WHERE id = '$id_update'";
        $result_update = mysqli_query($conexao, $query_update);
    }else{
        $query_update = "UPDATE vps SET status = 'Offline' WHERE id = '$id_update'";
        $result_update = mysqli_query($conexao, $query_update);
    }
    

}
?>