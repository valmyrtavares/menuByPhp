<?php

require_once 'config.php';
require_once 'dao/ProductDaoMysql.php';
require_once 'dao/UserDaoMysql.php';
require 'partials/header.php';  
 
require_once 'models/Auth.php';



$daoAuth = new Auth($pdo, $base);
$DaoUser = new UserDaoMysql($pdo);
$mainImg = $DaoUser->getMainImg();

 
$productDao = new ProductDaoMysql($pdo);
$products = $productDao->getProducts();


$infoCustomer = $daoAuth->checkTokenCustomer();


if(!$_SESSION['tokenCustumer'] && !$_SESSION['token']){
 header('Location:'.$base. '/loginCustomer.php' );
}

?>

<div  class="logo-container">
  <img src="<?=$base?>/media/products/<?=$mainImg['img'];?>" alt="cover"/>
   <?php if($_SESSION['tokenCustumer']): ?>
    <p data-type style="color:white;">Ola <?= $infoCustomer['name']; ?> Acompanhe seus pedidos aqui!!</p>
    <div class="hide">
    <?php require 'partials/customerOrders.php'?>; 
    </div>
    <?php endif ?> 
</div>
<?php if($_SESSION['nocustomer']):?>
    <h2 class="warning"><?= $_SESSION['nocustomer'];?></h2>
    <?= $_SESSION['nocustomer']=""?>
<?php endif; ?>

<h3 class="suggest-chef">Sugestão do Chef</h3>

<div class="content-carrossel">
    <?php foreach($products as $product):?>
        <?php if($product['showcase']==1): ?>        
            <?php require 'partials/carrossel.php';?>
        <?php endif; ?>
    <?php endforeach;?>
    <?php if($product['showcase']==1): ?>        
    <div class="content-button">
        <img class="btn" src="<?=$base?>/media/icon/left.png"/>
        <img class="btn" src="<?=$base?>/media/icon/right.png"/>
    </div>
    <?php endif; ?>
</div>
<p>
<h1 data-type class="menu-button">Bebidas</h1>
<div class="hide">
    <h1 data-type class="menu-button sub-first">Alcoólicas </h1>
    <div class="hide">
        <h1 data-type class=" menu-button sub-second">Vinhos</h1>
        <div class="hide" >
            <?php foreach($products as $product):?>
                <?php if($product['type']=='vinhos'): ?>        
                    <?php require 'partials/products.php';?>
                <?php endif; ?>
            <?php endforeach;?>
        </div>
        <h1 data-type class="menu-button sub-second">Cervejas</h1>
        <div class="hide" >
            <?php foreach($products as $product):?>
                <?php if($product['type']=='cervejas'): ?>        
                    <?php require 'partials/products.php';?>
                <?php endif; ?>
            <?php endforeach;?>
        </div>
        <h1 data-type class="menu-button sub-second">Drinks</h1>
        <div class="hide" >
            <?php foreach($products as $product):?>
                <?php if($product['type']=='drinks'): ?>        
                    <?php require 'partials/products.php';?>
                <?php endif; ?>
            <?php endforeach;?>
        </div>
    </div>
    <h1 data-type class="menu-button sub-first"> Sem álcool </h1>
    <div class="hide">
        <h1 data-type class="menu-button sub-second">Sucos</h1>       
        <div class="hide" >
            <?php foreach($products as $product):?>
                <?php if($product['type']=='suco'): ?>        
                    <?php require 'partials/products.php';?>
                <?php endif; ?>
            <?php endforeach;?>
        </div>
        
        
        <h1 data-type class="menu-button sub-second">Refriferantes</h1>
        <div class="hide" >
            <?php foreach($products as $product):?>
                <?php if($product['type']=='refrigerante'): ?>        
                    <?php require 'partials/products.php';?>
                <?php endif; ?>
            <?php endforeach;?>
        </div>
    </div>
</div>
   
</div>
<h1 data-type class="menu-button">Porções</h1>
<div class="hide">
    <?php foreach($products as $product):?>
        <?php if($product['type']=='porcoes'): ?>        
            <?php require 'partials/products.php';?>
        <?php endif; ?>
    <?php endforeach;?>
    </div>
</div >
<h1 data-type class="menu-button">Lanches</h1>
<div class="hide">
    <h1 data-type class="menu-button sub-first">Tradicionais</h1>
    <div class="hide">
        <?php foreach($products as $product):?>
            <?php if($product['type']=='lancesTradicionais'): ?>        
                <?php require 'partials/products.php';?>
            <?php endif; ?>
        <?php endforeach;?>
    </div>
    <h1 data-type class="menu-button sub-first">Gourmet</h1>
    <div class="hide">
        <?php foreach($products as $product):?>
            <?php if($product['type']=='lanchesEspeciais'): ?>        
                <?php require 'partials/products.php';?>
            <?php endif; ?>
        <?php endforeach;?>
    </div>
</div>
<h1 data-type class="menu-button" >Pratos</h1>
<div class="hide">
    <h1 data-type class="menu-button sub-first">Comida caseira</h1>
    <div class="hide">
        <?php foreach($products as $product):?>
            <?php if($product['type']=='caseira'): ?>        
                <?php require 'partials/products.php';?>
            <?php endif; ?>
        <?php endforeach;?>
    </div>
    <h1 data-type class="menu-button sub-first">Peixes </h1>
    <div class="hide">
        <?php foreach($products as $product):?>
            <?php if($product['type']=='peixes'): ?>        
                <?php require 'partials/products.php';?>
            <?php endif; ?>
        <?php endforeach;?>
    </div>
    <h1 data-type class="menu-button sub-first">Carnes</h1>
    <div class="hide">
        <?php foreach($products as $product):?>
            <?php if($product['type']=='carnes'): ?>        
                <?php require 'partials/products.php';?>
            <?php endif; ?>
        <?php endforeach;?>
    </div>
    <h1 data-type class="menu-button sub-first">Frutos do mar</h1>
    <div class="hide">
        <?php foreach($products as $product):?>
            <?php if($product['type']=='frutosdomar'): ?>        
                <?php require 'partials/products.php';?>
            <?php endif; ?>
        <?php endforeach;?>
    </div>
</div>



<script src="asset/js/script.js"></script>
<script type="module" src="asset/js/js/script.js"></script>

<?php require 'partials/footer.php'?>

</body>
</html>

<!-- @category:debuggers PHP -->
<!-- http://localhost/menu/login.php
http://pratododia.pessoal.ws/ -->