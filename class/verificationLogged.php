<?php

if(isset($_SESSION['id'])){
    header('Location: /Account/index.php');
    exit();
}

?>