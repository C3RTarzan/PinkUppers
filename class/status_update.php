<?php 

// Money
$query = "select * from bank where user_id = '$id' "; //consulta com bd
$result = mysqli_query($conexao, $query); // juntas os 2
$row = mysqli_num_rows($result); // verificar se existe uma linha
$update = 0;
for($i = 0; $i < $row; $i++){
    $dado = mysqli_fetch_array($result); // extrair dados da tabela sql
    $update += $dado['balance'];
}
$query = "UPDATE status SET money = '$update' WHERE user_id = '$id'";
$result = mysqli_query($conexao, $query);

// Server

$query = "select * from vps where user_id = '$id' "; //consulta com bd
$result = mysqli_query($conexao, $query); // juntas os 2
$row = mysqli_num_rows($result); // verificar se existe uma linha
$query = "UPDATE status SET server = '$row' WHERE user_id = '$id'";
$result = mysqli_query($conexao, $query);

?>