<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/style.css"/>
    <title>Menu</title>
</head>
<body>
    <?php if($_SESSION['token']): ?>
        <button data-btn="mobile"></button>
     <div class="main-menu">
       <a href="<?=$base;?>">Home</a>
       <a href="<?=$base?>/waitersPanel.php">Painel do garçon</a>
       <!-- <a href="<?=$base;?>/customerOrders.php">check</a> -->
       <!-- <a href="<?=$base;?>/editUser.php">Editar perfil</a>
       <a href="<?=$base;?>/login.php">Login</a> -->
       <!-- <a href="<?=$base;?>/customers_list.php">Lista de clientes</a>
       <a href="<?=$base;?>/signup_Customer.php">Cliente login</a> -->
       <!-- <a href="<?=$base;?>/signup.php">Cadastrar</a> -->
       <a href="<?=$base;?>/sendProduct.php">Enviar Produts</a>
       <a href="<?=$base;?>/requestList.php">Pedidos feitos</a>
       <a href="<?=$base;?>/logout.php">Sair</a>
       <a href="<?=$base;?>/logoutCustomer.php">Sair Cliente</a>
   </div>
   <!-- <p>Ola!! <?=$infoCustomer['name'] ?></P> -->
<?php endif ?>