<?php

if(isset($_SESSION['id'])){
    header('Location: /Account/index.php');
    exit();
}

if(!$_SESSION['id']){
    header('Location: /index.php');
    exit();
}

?>