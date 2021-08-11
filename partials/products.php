
    <div  class="products" >
        <h1 class="teste-produtos"> <?= $product['title']; ?> </h1>
        <h2 ><?=$product['subtitle']; ?></h1>    
        <img src="<?=$product['img'];?>" alt="teste"/>
        <p>R$<span><?=$product['showcase'] ?><span>,00</p>
    </div>



    <div  class="modal-product ">
        <button onClick="onClose()"> X</button>
        <h1 class="teste-produtos"> <?= $product['title']; ?> </h1>
        <img src="<?=$product['img'];?>" alt="teste"/>
    </div>
    
  