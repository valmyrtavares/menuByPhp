<?php
require_once 'config.php';
require_once 'dao/RequestDaoMysql.php';
require_once 'models/Auth.php';

$daoRequest = new RequestDaoMysql($pdo);
$daoAuth = new Auth($pdo, $base);
$infoCustomer = $daoAuth->checkTokenCustomer();

$id = filter_input(INPUT_POST,'id');
$price = filter_input(INPUT_POST,'price');
$title = filter_input(INPUT_POST,'title');
$comment = filter_input(INPUT_POST, 'comment');

$date = new DateTime();
$date->setTimezone(new DateTimeZone('America/Sao_Paulo'));
$now = $date->format('Y/m/d H:i:s');  



if(!$infoCustomer){
    header('Location:' .$base);
    $_SESSION['nocustomer']="Pedidos só são possíveis quando houverem clientes";
}


    $daoRequest = new RequestDaoMysql($pdo);
    $newRequest = new Request();
    $newRequest->dat = $now;
    $newRequest->mesa = $_SESSION['tableNumber'];
    $newRequest->id_customer = $infoCustomer['idcustumer'];
    $newRequest->token = $infoCustomer['token'];
    $newRequest->name_customer = $infoCustomer['name'];
    $newRequest->id_product = $id;
    $newRequest->product_title = $title;
    $newRequest->comment = $comment;
    $newRequest->price = $price;
    
    
    

    $daoRequest->insert($newRequest);

    header('Location: ' .$base);

    