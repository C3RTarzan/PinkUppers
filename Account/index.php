<?php
    session_start();
    date_default_timezone_set('America/Sao_Paulo');
    include("../class/verificationLogin.php");
    include("../class/conexao.php");
    $id = $_SESSION['id'];
    $user = $_SESSION['user'];
    include("../class/ip_update.php");
    include("../class/account_vps_off.php");
    include("../class/status_update.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/index/account.css">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    
    <title>Account</title>
</head>

<body>
    <div class="warning exeption">
        <div class="close">
            <span class="iconify" data-icon="ep:circle-close-filled"></span>
        </div>
        <div class="msg">
            <span></span>
        </div>
        <div class="button">
            <span>ACEITAR</span>
        </div>
    </div>
    <?php if(isset($_SESSION["balance_vps"])): ?>
        <div class="exeption">
            <div class="close">
                <span class="iconify" data-icon="ep:circle-close-filled"></span>
            </div>
            <span class="msg">Saldo Insuficiente!!</span>
        </div>
    <?php
        endif;
        unset($_SESSION['balance_vps']); 
    ?>
    <?php
    $query = "select * from vps where user_id = '$id' and status = 'Unavailable'";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);
    if($row > 0):

    ?>
    <div class="time-vps-wait">
        <?php 
        for($i = 0; $i < $row; $i++):
            $dado = mysqli_fetch_array($result); 
            $ipUpdate = $dado['ipUpdate'];
            $ipUpdateStart = $dado['ipUpdateStart'];
            $ip = $dado['ip'];
            $date = strtotime(date('Y-m-d H:i:s'));

            $contPorc = ($ipUpdate - $date);
    
            $porc =  round(($ipUpdateStart - $date) * 100 / ($ipUpdateStart - $ipUpdate));
            
            
            $str = $ipUpdate - $ipUpdateStart;
            
                if($str < 60){

                    $count =  date('s', $contPorc);

                }elseif($str < 3600){

                    $count =  date('i:s', $contPorc);

                }else{

                    $count =  date('H:i:s', $contPorc);

                }
         ?>
        <input id="value-start" class="none" value="<?php echo $ipUpdateStart ?>">
        <input id="value-end" class="none" value="<?php echo $ipUpdate ?>">
        <div class="wait-iten"> 
            <div class="iten-inffo-number">
                <div class="number-time update_VPS">
                    <span></span> 
                </div>
                <div class="number-percentage update_VPS">
                    <span></span>   
                </div>
            </div>
            <div class="iten-percentage-bar">
                <div class="bar-inffo">
                    <span><?php echo $ip ?></span>
                </div>
                <div class="bar-bc update_VPS"> 
                    <div class="bar">
                        <div class="bar-inside">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>
    <div class="wait-arrow">
        <span class="iconify" data-icon="bx:bxs-right-arrow"></span>
    </div>
    <?php endif ?>
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
                        $money = str_replace('.', ',',sprintf('%.2f', $dado["money"]));
                        $ddos = $dado["ddos"];
                        $bitcoin = $dado["bitcoin"];
                        $server = $dado["server"];
                        $status = $dado["status"];
                    ?>
                    <div class="item-name">
                        <div class="name-primary">
                            <span>Reputa????o:</span>
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
                            <span>R$ <?php echo $money?></span>
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
                    $ip = $dado['ip'];
                    $status = $dado['status'];
                    $datestr = strtotime($dado['date']);
                    if($status == 'Unavailable'){
                        $ipUpdate = $dado['ipUpdate'];
                        $ipUpdateStart = $dado['ipUpdateStart'];
                        $str = $ipUpdate - $ipUpdateStart;
                        $dateNow = strtotime(date('Y-m-d H:i:s'));
                        $contPorc = ($ipUpdate - $dateNow);
                        if($str < 60){
    
                            $count =  date('s', $contPorc);
        
                        }elseif($str < 3600){
        
                            $count =  date('i:s', $contPorc);
        
                        }else{
        
                            $count =  date('H:i:s', $contPorc);
        
                        }
                    }

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

                            <?php if ( $status == 'Online' || $status == 'Unavailable'): ?>
                                <span>Vencimento</span>
                            <?php endif ?>

                            <?php if ( $status == 'Offline'): ?>
                                <span>Vencido</span>
                            <?php endif ?>
                                
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
                            <?php if ( $status == 'Online'): ?>
                            <span>Alterar IP</span>
                            <?php endif ?>
                            <?php if ( $status == 'Offline'): ?>
                            <span>Renovar</span>
                            <?php endif ?>
                            <?php if ( $status == 'Unavailable'): ?>
                            <span>Alterando IP</span>
                            <?php endif ?>
                        </div>
                        <div class="gerency">
                            <?php if ($status == 'Online'): ?>
                            <form action="./Desktop/index.php" method="post">
                                <button name="log-in" value="<?php echo $ip ?>">ENTRAR</button>
                            </form>
                            <?php endif ?>
                            <?php if ($status == 'Offline' || $status == 'Unavailable'): ?>
                            <span>ENTRAR</span>
                            <?php endif ?>
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
                            <form action="./update_ip.php" method="post">
                                <button name="trocate" value="<?php echo $ip?>">Trocar</button>
                            </form>
                        </div>
                    </div>
                    <?php endif; ?>
                        <?php
                            if($status == 'Offline'):
                        ?>
                    <div class="renew IP-gerency">
                        <div class="renew-price">
                            <span>500$</span>
                        </div>
                        <div class="renew-renovation">
                            <span class="renovation">Renova????o</span>
                            <span><?php echo date('d/m/Y', strtotime(date('Y-m-d')) + 2592000);?></span>
                        </div>
                        <div class="renew-time">
                            <span>30 Dias</span>
                        </div>
                        <div class="renew-renew">
                            <form action="./renovate.php" method="post">
                                <button name="renovate" value="<?php echo $ip?>">Renovar</button>
                            </form>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php
                        if($status == 'Unavailable'):
                    ?>
                    <div class="IP-gerency">
                        <div class="ip-number">
                            <span>--- --- ---</span>
                        </div>
                        <div class="ip-price">
                            <span>500$</span>
                        </div>
                        <div class="ip-time unavailable-time">
                            <span></span>
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
                    $balance = str_replace('.', ',', sprintf('%.2f', $dado['balance']));
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
                            <span>AG: <span><?php echo $agency;?></span> C: <?php echo $account?></span>
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