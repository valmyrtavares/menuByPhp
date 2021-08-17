<?php
require_once('config.php');
require_once('dao/ProductDaoMysql.php');

$id = filter_input(INPUT_GET, 'id');
$daoProduct = new ProductDaoMysql($pdo);
$product = $daoProduct->findById($id);

require 'partials/header.php';
?>
<div class="content-form">
    <h1>Editar Produto</h1>
    <form class="form-send" method="POST" enctype="multipart/form-data" action="updateProduct_action.php" >
        <input type="hidden" name="id" value="<?=$id; ?>"/>
        <label>Titulo </label>
            <input type="text" name="title" value="<?=$product->title ?>"/>
        <label>Subtitulo </label>
            <input type="text" name="subtitle" value="<?=$product->subtitle ?>"/>
        <label>imagem </label>
            <input type='hidden' name="currentName" value="<?=$product->img;?>"/>
            <input type="file" name="img" /></br>
            <img src="<?=$base?>/media/products/<?=$product->img;?>" alt="produto"/>
        <label>Escolha o tipo:</label>
            <select  name="type">
                <option value="<?=$product->type?>" selected><?=$product->type?></option>
                <option value="bebidas">Bebidas</option>
                <option value="pratos">Pratos</option>
                <option value="porcoes">Porçoes</option>
                <option value="lanches">Lanchers</option>
            </select>
        <div class="check">
            <input type="checkbox" id="chef" name="showcase"  value="<?=$product->showcase;?>"
            <?=$check = $product->showcase==1? 'checked':"" ?> <?=$check?>/>
            <label for="chef"> Sugestão do Chef </label></br>
        </div>

           
        <label>preço </label>
            <input type="number" name="price" value="<?=$product->price ?>"/>
        <input type="submit" value="Enviar">
    </form>
</div>

