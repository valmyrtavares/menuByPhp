<?php
require_once 'config.php';
require_once 'dao/RequestDaoMysql.php';

$id = filter_input(INPUT_POST,'id');
$price = filter_input(INPUT_POST,'price');
$title = filter_input(INPUT_POST,'title');



$daoRequest = new RequestDaoMysql($pdo);
    $newRequest = new Request();
    $newRequest->id = $id;
    $newRequest->price = $price;
    $newRequest->title = $title;

    $daoRequest->insert($newRequest);
    