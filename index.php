<?php
require_once 'config.php';
require 'dao/ProductDaoMysql.php';

    require 'partials/header.php';



$productDao = new ProductDaoMysql($pdo);
$products = $productDao->getProducts();


?>
<div  class="logo-container">
    <?php if(!empty($_SESSION['cover'])):?>
        <img src="<?=$base?>/media/products/<?=$_SESSION['cover']?>" alt="cover"/>
        <?php else:?>
            <form class="send-logo" method="POST"  action="imgcover_action.php" enctype="multipart/form-data">
            <label>Imagem de Cabeçario
            <input type="file" name="cover"/>
            <input type="submit" value="enviar">
            </label>
        </form>
    <?php endif;?>
   
</div>
<h3 class="suggest-chef">Sugestão do Chef</h3>

<div class="content-carrossel">
    <?php foreach($products as $product):?>
        <?php if($product['showcase']==1): ?>        
            <?php require 'partials/carrossel.php';?>
        <?php endif; ?>
    <?php endforeach;?>
</div>

<h1 data-type>Bebidas</h1>
<div class="hide">
    <h1 data-type class="sub-first">Alcoólicas </h1>
    <div class="hide">
        <h1 data-type class="sub-second">Vinhos</h1>
        <div class="hide" >
            <?php foreach($products as $product):?>
                <?php if($product['type']=='vinhos'): ?>        
                    <?php require 'partials/products.php';?>
                <?php endif; ?>
            <?php endforeach;?>
        </div>
        <h1 data-type class="sub-second">Cervejas</h1>
        <div class="hide" >
            <?php foreach($products as $product):?>
                <?php if($product['type']=='cervejas'): ?>        
                    <?php require 'partials/products.php';?>
                <?php endif; ?>
            <?php endforeach;?>
        </div>
        <h1 data-type class="sub-second">Drinks</h1>
        <div class="hide" >
            <?php foreach($products as $product):?>
                <?php if($product['type']=='drinks'): ?>        
                    <?php require 'partials/products.php';?>
                <?php endif; ?>
            <?php endforeach;?>
        </div>
    </div>
    <h1 data-type class="sub-first"> Sem álcool </h1>
    <div class="hide">
        <h1 data-type class="sub-second">Sucos</h1>       
        <div class="hide" >
            <?php foreach($products as $product):?>
                <?php if($product['type']=='suco'): ?>        
                    <?php require 'partials/products.php';?>
                <?php endif; ?>
            <?php endforeach;?>
        </div>
        
        
        <h1 data-type class="sub-second">Refriferantes</h1>
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
<h1 data-type>Porções</h1>
<div class="hide">
    <?php foreach($products as $product):?>
        <?php if($product['type']=='porcoes'): ?>        
            <?php require 'partials/products.php';?>
        <?php endif; ?>
    <?php endforeach;?>
    </div>
</div >
<h1 data-type>Lanches</h1>
<div class="hide">
<h1 data-type class="sub-first">Tradicionais</h1>
<div class="hide">
    <?php foreach($products as $product):?>
        <?php if($product['type']=='lancesTradicionais'): ?>        
            <?php require 'partials/products.php';?>
        <?php endif; ?>
    <?php endforeach;?>
</div>
<h1 data-type class="sub-first">Gourmet</h1>
<div class="hide">
    <?php foreach($products as $product):?>
        <?php if($product['type']=='lanchesEspeciais'): ?>        
            <?php require 'partials/products.php';?>
        <?php endif; ?>
    <?php endforeach;?>
</div>

</div>
<div class="hide">
    <?php foreach($products as $product):?>
        <?php if($product['type']=='lanches'): ?>        
            <?php require 'partials/products.php';?>
        <?php endif; ?>
    <?php endforeach;?>
</div>

<h1 data-type>Pratos</h1>
<div class="hide">
    <h1 data-type class="sub-first">Comida caseira</h1>
    <div class="hide">
        <?php foreach($products as $product):?>
            <?php if($product['type']=='caseira'): ?>        
                <?php require 'partials/products.php';?>
            <?php endif; ?>
        <?php endforeach;?>
    </div>
    <h1 data-type class="sub-first">Peixes </h1>
    <div class="hide">
        <?php foreach($products as $product):?>
            <?php if($product['type']=='peixes'): ?>        
                <?php require 'partials/products.php';?>
            <?php endif; ?>
        <?php endforeach;?>
    </div>
    <h1 data-type class="sub-first">Carnes</h1>
    <div class="hide">
        <?php foreach($products as $product):?>
            <?php if($product['type']=='carnes'): ?>        
                <?php require 'partials/products.php';?>
            <?php endif; ?>
        <?php endforeach;?>
    </div>
    <h1 data-type class="sub-first">Frutos do mar</h1>
    <div class="hide">
        <?php foreach($products as $product):?>
            <?php if($product['type']=='frutosdomar'): ?>        
                <?php require 'partials/products.php';?>
            <?php endif; ?>
        <?php endforeach;?>
    </div>
</div>



<script src="asset/js/script.js"></script>
<?php require 'partials/footer.php'?>

</body>
</html>

<!-- @category:debuggers PHP -->
<!-- http://localhost/menu/login.php
http://pratododia.pessoal.ws/ -->