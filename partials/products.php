
    <div  class="products" >
        <h1 class="teste-produtos"> <?= $product['title']; ?> </h1>
        <h2 ><?=$product['subtitle']; ?></h1>    
        <img src="<?=$base;?>/media/products/<?=$product['img']?>" alt="teste"/>
        <p>R$<span><?=$product['price'] ?><span>,00</p>
        <?php if($user):?>
        <a href="<?=$base;?>/editProducts.php?id=<?=$product['id'];?>" class='admin-edit'>Editar prato</a>
        <?php endif;?>
    </div>



    <div  class="modal-product ">
        <button onClick="onClose()"> X</button>
        <h1 class="teste-produtos"> <?= $product['title']; ?> </h1>
        <img src="<?=$base;?>/media/products/<?=$product['img']?>" alt="teste"/>
    </div>
    
  