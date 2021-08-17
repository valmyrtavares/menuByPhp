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
            <img src="<?=$base;?>/media/products/<?=$product['img']?>"alt="teste"/>
           <!-- <button  onclick="eu()"> <a href="<?=$base;?>/delete.php?id=<?=$product->id;?>"> Excluir intem</a></button> -->
            <a href="<?=$base;?>/delete.php?id=<?=$product['id'];?>" onclick="return confirm('Tem certeza que quer exluir')"> Excluir intem</a>
            <a href="<?=$base;?>/editProducts.php?id=<?=$product['id'];?>">Editar</a>
        </div>
    <?php endforeach;?>
    <form class="send-header" method="POST"  action="imgcover_action.php" enctype="multipart/form-data">
        <label>Imagem de Cabeçario   </label>
            <input type="file" name="cover"/>
            <input type="submit" value="enviar">
            <img src="media/products/<?=$_SESSION['cover']?>"/>     
    </form>
</div>

