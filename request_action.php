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

// echo '<pre>';
// print_r($infoCustomer);
// exit;


    $daoRequest = new RequestDaoMysql($pdo);
    $newRequest = new Request();
    $newRequest->dat = $infoCustomer['date'];
    $newRequest->mesa = 23;
    $newRequest->id_customer = $infoCustomer['idcustumer'];
    $newRequest->id_product = $id;
    $newRequest->product_title = $title;
    $newRequest->price = $price;

    print_r($newRequest);
    

    $daoRequest->insert($newRequest);

    