<?php
require_once 'config.php';
require 'dao/ProductDaoMysql.php';


require 'partials/header.php';

$productDao = new ProductDaoMysql($pdo);
$products = $productDao->getProducts();


?>
<div  class="logo-container">
    <?php if(!empty($_SESSION['cover'])):?>
        <img src="media/products/<?=$_SESSION['cover']?>" alt="cover"/>
        <?php else:?>
            <form class="send-logo" method="POST"  action="imgcover_action.php" enctype="multipart/form-data">
            <label>Imagem de Cabeçario
            <input type="file" name="cover"/>
            <input type="submit" value="enviar">
            </label>
        </form>
    <?php endif;?>
   
</div>

<div class="content-carrossel">
    <?php foreach($products as $product):?>
        <?php if($product['showcase']==1): ?>        
            <?=require 'partials/carrossel.php';?>
        <?php endif; ?>
    <?php endforeach;?>
</div>

<h1 data-type>Bebidas</h1>
<div >
    <?php foreach($products as $product):?>
        <?php if($product['type']=='bebidas'): ?>        
            <?=require 'partials/products.php';?>
        <?php endif; ?>
    <?php endforeach;?>
</div>
<h1 data-type>Porções</h1>
<div >
    <?php foreach($products as $product):?>
        <?php if($product['type']=='porcoes'): ?>        
            <?=require 'partials/products.php';?>
        <?php endif; ?>
    <?php endforeach;?>
    </div>
</div >
<h1 data-type>Lanches</h1>
<div >
    <?php foreach($products as $product):?>
        <?php if($product['type']=='lanches'): ?>        
            <?=require 'partials/products.php';?>
        <?php endif; ?>
    <?php endforeach;?>
</div>
<h1 data-type>Pratos</h1>
<div >
    <?php foreach($products as $product):?>
        <?php if($product['type']=='pratos'): ?>        
            <?=require 'partials/products.php';?>
        <?php endif; ?>
    <?php endforeach;?>
</div>

<script src="asset/js/script.js"></script>

</body>
</html>

<!-- @category:debuggers PHP -->