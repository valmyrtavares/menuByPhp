
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
        <div>
            <form  method="POST" action="request_action.php">
                <input class="comment_request" type="text" name="comment" placeholder="lembrete personalizado"/>
                <input type="hidden" name="id" value="<?=$product['id']?>"/>
                <input type="hidden" name="title" value="<?=$product['title']?>"/>
                <input type="hidden" name="price" value="<?=$product['price']?>"/>
                <input class="btn_request"  type="submit"  value="Pedir"/>
           
            </form>
            <button class="btn_close" style="background:red;" onClick="onClose()">Fechar</button>
        </div> 
        <img src="<?=$base;?>/media/products/<?=$product['img']?>" alt="teste"/>
        <p><?=$product['subtitle']; ?></p>   
    </div>

    <!-- Esse é um texto fake que está aqui para preencher mais ou menos o espaço que os chefes de restaurante terão para usar dentro do aplicativo
     -->
  