<?php

if(isset($_POST['log-in'])){

    $ip = $_POST['log-in'];

    $query = "select * from vps where ip = '$ip'";
    $result = mysqli_query($conexao, $query);
    $dado = mysqli_fetch_array($result); 

    if( $dado['status'] == 'Offline'){
        header('Location: /Account/index.php');
        exit();
    }
}
?>