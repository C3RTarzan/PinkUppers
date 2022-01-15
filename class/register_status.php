<?php

$id = $dado['id'];

$reputation = 0;
$time = 0;
$money = "0,00";
$ddos = 0;
$bitcoin = "0.0000000";
$server = 0;
$status = "Disconnected";

$query_status_create = "INSERT into status (user_id, reputation, time, money, ddos, bitcoin, server, status) VALUES ('$id', '$reputation', '$time', '$money', '$ddos', '$bitcoin', '$server', '$status')";
$result_status_create = mysqli_query($conexao, $query_status_create);


?>