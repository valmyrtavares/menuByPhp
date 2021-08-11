<?php
require_once 'config.php';
require_once 'dao/ProductDaoMysql.php';


$daoProduct = new ProductDaoMysql($pdo);
$products = $daoProduct->getProducts();

require 'partials/header.php'

?>

<div>
    <?php foreach($products as $product): ?>
        <div class="products-edit-line">
            <h3><?=$product['title']?></h3>
            <img src="<?=$product['img']?>"alt="teste"/>
           <!-- <button  onclick="eu()"> <a href="<?=$base;?>/delete.php?id=<?=$product->id;?>"> Excluir intem</a></button> -->
            <a href="<?=$base;?>/delete.php?id=<?=$product['id'];?>" onclick="return confirm('Tem certeza que quer exluir')"> Excluir intem</a>
            <a href="<?=$base;?>/editProducts.php?id=<?=$product['id'];?>">Editar</a>
        </div>
    <?php endforeach;?>
</div>

