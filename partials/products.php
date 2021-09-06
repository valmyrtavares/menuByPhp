
    <div  class="products" >
        <div style="flex:3;">
            <img  src="<?=$base;?>/media/products/<?=$product['img']?>" alt="teste"/>
            <h1 class="teste-produtos"> <?= $product['title']; ?> </h1>
        </div>
        <p style="flex:7"> <?= $product['subtitle']; ?> </p>

       
        <p style="flex:.5" >R$<span><?=$product['price'] ?><span>,00</p>
        <?php if($_SESSION['token']):?>
            <a href="<?=$base;?>/editProducts.php?id=<?=$product['id'];?>" class='admin-edit'>Editar prato</a>
        <?php endif;?>
    </div>

    
    



    <div  class="modal-product ">
        <h1 class="teste-produtos"> <?= $product['title']; ?> </h1>
        <img src="<?=$base;?>/media/products/<?=$product['img']?>" alt="teste"/>
        <p><?=$product['subtitle']; ?></p>   
        <div>
            <button style="background:gree;">Pedir</button>
            <button style="background:red;" onClick="onClose()">Fechar</button>
        </div> 
    </div>

    <!-- Esse é um texto fake que está aqui para preencher mais ou menos o espaço que os chefes de restaurante terão para usar dentro do aplicativo
     -->
  