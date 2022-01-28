<?php
    session_start();
    include("../class/verificationLogin.php");
    include("../class/conexao.php");
    $id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/index/account-renovate.css">
    <title>Renovação</title>
</head>
<body>
    <div class="ip">
        <span> <?php echo $_POST['trocate'] ?> </span>
    </div>
    <div class="absolute-trocarte">
        <form action="../class/ip_trocate.php" method="post">
            <div class="bank">
                <div class="bank-text">
                    <div class="title">
                        <span>Escolha seu banco</span>
                    </div>
                    <div class="price">
                        <span class="price-text">Preço</span>
                        <span class="price-value">500$</span>
                    </div>
                </div>
                <div class="select">
                    <select name="bankSelect">
                        <?php 
                        $query = "select * from bank where user_id = '$id'";
                        $result = mysqli_query($conexao, $query);
                        $row = mysqli_num_rows($result);
                        for($i = 0; $i < $row; $i++):
                            $dado = mysqli_fetch_array($result);
                            $agency = $dado['agency'];
                            $balance = str_replace('.', ',',sprintf('%.2f', $dado["balance"]));;
                        ?>
                        <option value="<?php echo $agency ?>"><?php echo 'Ag: ', $agency, ' | Saldo: $', $balance?></option>
                        <?php endfor ?>
                    </select>
                </div>
            </div>
            <div class="button">
                <button name='trocate' value='<?php echo $_POST['trocate'] ?>'>Trocar Ip</button>
            </div>
        </form>
    </div>
</body>
</html>