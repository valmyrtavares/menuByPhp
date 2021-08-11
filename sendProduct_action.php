<?php
require_once 'config.php';
require_once 'model/Product.php';
require_once 'dao/ProductDaoMysql.php';

$title = filter_input(INPUT_POST, 'title');
$subtitle = filter_input(INPUT_POST, 'subtitle');
$img = filter_input(INPUT_POST, 'img');
$type = filter_input(INPUT_POST, 'type');
$price = filter_input(INPUT_POST, 'price');
$showcase = filter_input(INPUT_POST, 'showcase');


$showcase = $showcase ? 1:0;


//echo $title. "   " .$subtitle. "    " .$img. "   " .$price. "  " .$type. "  " .$showcase;

if($title && $subtitle && $img && $type && $price){

   $daoProduct = new ProductDaoMysql($pdo);
    $newProduct = new Product();
    $newProduct->title = $title;
    $newProduct->subtitle = $subtitle;
    $newProduct->img = $img;
    $newProduct->type = $type;
    $newProduct->price = $price;
    $newProduct->showcase = $showcase;

   $daoProduct->insert($newProduct);
   header('Location: '.$base);
   exit;
}else{
    $_SESSION['envio']= "Todos os campos precisam ser preenchidos";
    header('Location: '.$base. '/sendProduct.php');
}
