<?php
 require_once 'model/Product.php';
 require_once 'dao/ProductDaoMysql.php';
 require_once 'config.php';

 $id = filter_input(INPUT_POST, 'id');
$title = filter_input(INPUT_POST, 'title');
$subtitle = filter_input(INPUT_POST, 'subtitle');
$img = filter_input(INPUT_POST, 'img');
$type = filter_input(INPUT_POST, 'type');
$showcase = filter_input(INPUT_POST, 'showcase');
$price = filter_input(INPUT_POST, 'price');

//echo "SHOWCASE VEM NATURALEMNTE COMO       " .$showcase. "</br>";

if($showcase==""){  
    echo "Se eu não existo sou zero </br>";
    $showcase = 0;
}else{  
    echo "Se eu existo sou um </br>";
    $showcase = 1;
}

//echo "SHOWCASE:  ".$showcase;

//echo $title. "   " .$subtitle. "    " .$img. "   " .$price. "  " .$type. " showcase " .$showcase;

$productEdit = new Product();

$productEdit->id = $id;
$productEdit->title = $title;
$productEdit->subtitle = $subtitle;
$productEdit->img = $img;
$productEdit->type = $type;
$productEdit->showcase = $showcase;
$productEdit->price = $price;



$daoProduct = new ProductDaoMysql($pdo);
$product = $daoProduct->update($productEdit);

if($product){
    header('Location: '.$base);
}else{
    header('Location: '.$base."/updateProduct.php");
}

