<?php
    session_start();
    include("../class/verificationLogin.php");
    include("../class/conexao.php");
    $id = $_SESSION['id'];
    $user = $_SESSION['user'];
    include("../class/account_vps_off.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/index/account.css">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    
    <title>Account</title>
</head>

<body>
    <section>
        <div class="section-background">
            <div class="header-sec">
                <div class="optins">
                    <span class="iconify" data-icon="mi:options-horizontal"></span>
                    <div class="bc-options">
                        <div class="Conta">
                            <span class="iconify" data-icon="ic:baseline-account-circle"></span>
                            <span>Conta</span>
                        </div> 
                        <div class="Sair">
                            <span class="iconify" data-icon="ic:outline-exit-to-app"></span>
                            <span>Sair</span>
                        </div>
                    </div>
                </div>
                <div class="photo-background">
                    <div class="photo">
                        <div class="form-photo">
                            <img src="/public/img/user.png" alt="">
                        </div>
                    </div>
                    <div class="name">
                        <span><?php echo $user?></span>
                    </div>
                </div>
                <div class="info-background">
                    <?php
                    $query = "select * from status where user_id = '$id'";
                    $result = mysqli_query($conexao, $query);
                    $row = mysqli_num_rows($result);
                    if($row > 0):
                        $dado = mysqli_fetch_array($result); 
                        $reputation = $dado["reputation"];
                        $time = $dado["time"];
                        $money = $dado["money"];
                        $ddos = $dado["ddos"];
                        $bitcoin = $dado["bitcoin"];
                        $server = $dado["server"];
                        $status = $dado["status"];
                    ?>
                    <div class="item-name">
                        <div class="name-primary">
                            <span>Reputação:</span>
                        </div>
                        <div class="name-secondary">
                            <span>Tempo:</span>
                        </div>
                        <div class="name-primary">
                            <span>Dinheiro:</span>
                        </div>
                        <div class="name-secondary">
                            <span>DDOS:</span>
                        </div>
                        <div class="name-primary">
                            <span>Bitcoin:</span>
                        </div>
                        <div class="name-secondary">
                            <span>Servidor:</span>
                        </div>
                        <div class="name-primary">
                            <span>Status:</span>
                        </div>
                    </div>
                    <div class="item-value">
                        <div class="value-primary">
                            <span><?php echo $reputation ?></span>
                        </div>
                        <div class="value-secondary">
                            <span><?php echo $time ?></span>
                        </div>
                        <div class="value-primary">
                            <span>R$ <?php echo $money ?></span>
                        </div>
                        <div class="value-secondary">
                            <span><?php echo $ddos ?> GB</span>
                        </div>
                        <div class="value-primary">
                            <span><?php echo $bitcoin ?></span>
                        </div>
                        <div class="value-secondary">
                            <span><?php echo $server ?></span>
                        </div>
                        <div class="value-primary">
                            <span><?php echo $status ?></span>
                        </div>
                    </div>
                    <?php
                        endif;
                    ?>
                </div>
            </div>
            <div class="section-sec">
                <?php
                $query = "select * from vps where user_id = '$id'";
                $result = mysqli_query($conexao, $query);
                $row = mysqli_num_rows($result);
                for($i = 0; $i < $row; $i++):
                    $dado = mysqli_fetch_array($result); 
                    $date = $dado['date'];
                    $datestr = strtotime($dado['date']);
                    $ip = $dado['ip'];
                    $status = $dado['status'];
                ?>
                    <div class="VPS <?php echo $status ?>-vps">
                        <div class="icon">
                            <span class="iconify <?php echo $status?>" data-icon="bx:bxs-server" data-inline="false"></span>
                        </div>
                        <div class="info">
                            <div class="info-title">
                                <span><?php echo $ip?></span>
                            </div>
                            <div class="info-state <?php echo $status?>">
                                <span class="state"> <?php echo $status ?></span>
                            </div>
                        </div>
                        <div class="date">
                            <div class="date-title">
                                <span>Vencimento</span>
                            </div>
                            <div class="date-info">
                                <span>
                                    <?php
                                    if($date == '----'){
                                        echo "----" ;
                                    }else{
                                        echo date("d/m/Y", $datestr );
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div class="IP <?php echo $status ?>-ip">
                            <span>Alterar IP</span>
                        </div>
                        <div class="gerency">
                            <span>ENTRAR</span>
                        </div>
                    </div>
                    <?php
                        if($status == 'Online'):
                    ?>
                    <div class="IP-gerency">
                        <div class="ip-number">
                            <span><?php echo $ip?></span>
                        </div>
                        <div class="ip-price">
                            <span>500$</span>
                        </div>
                        <div class="ip-time">
                            <span>10m</span>
                        </div>
                        <div class="ip-trocarte">
                            <span>Trocar</span>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php
                endfor;
                ?>
            </div>
            <div class="section2-sec">
                <?php
                $query = "select * from bank where user_id = '$id'";
                $result = mysqli_query($conexao, $query);
                $row = mysqli_num_rows($result);
                for($i = 0; $i < $row; $i++):
                    $dado = mysqli_fetch_array($result); 
                    $account = $dado['account'];
                    $agency = $dado['agency'];
                    $balance = $dado['balance'];
                    $date = strtotime($dado['date']);
                ?>           
                <div class="bank">
                    <div class="bank-name">
                        <div class="icon-bank">
                            <div class="img">
                                <img src="/public/img/bank.jpeg" alt="">
                            </div>
                        </div>
                        <div class="info-bank">
                            <span>AG: <?php echo $agency;?> C: <?php echo $account?></span>
                        </div>
                        <div class="option-bank">
                            <div class="pencil-option">
                                <span class="iconify" data-icon="bx:bxs-pencil"></span>
                            </div>
                            <div class="exit-option">
                                <span class="iconify" data-icon="ph:x-bold"></span>
                            </div>
                        </div>
                    </div>
                    <div class="bank-dice">
                        <div class="title-dice">
                            <span>Saldo</span>
                        </div>
                        <div class="value-dice">
                            <div class="coin-value">
                                <span>R$</span>
                            </div>
                            <div class="balance-value">
                                <span><?php echo $balance ?></span>
                            </div>
                        </div>
                        <div class="date-dice">
                            <span>Atualizado em <?php echo date("d/m/Y", $date ); ?></span>
                        </div>
                    </div>
                    <div class="bank-button">
                        <button>Entrar</button>
                    </div>
                </div>
                <?php
                endfor;
                ?>
            </div>
        </div>
    </section>

    <?php
    include "../view/footer.php";
    ?>

</body>
<script src="/public/js/accounts.js"></script>
</html>