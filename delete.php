<?php
require_once 'config.php';
require_once 'dao/ProductDaoMysql.php';
$id = filter_input(INPUT_GET, 'id');
if($id){
$productDao = new ProductDaoMysql($pdo);
$productDao->delete($id);
header('Location:' .$base. "/edit_delete.php");
}

