<?php
require 'partials/header.php';
?>
<div class="content-form">
    <h1> Fomulário de envio de pratos</h1>
    <?php if(!empty($_SESSION['envio'])):?>
      <?=$_SESSION['envio']; ?>
      <?=$_SESSION['envio']=" ";?>
    <?php endif; ?>
    <form class="form-send" method="POST" action="sendProduct_action.php" enctype="multipart/form-data">
        <label>Titulo</label>
            <input type="text" name="title"/>
        <label>Subtitulo</label>
            <input type="text" name="subtitle"/>
        <label>Imagem</label>
            <input type="file" name="img"/>
        
            <select  name="type">
                <option value="" selected>Selecione tipo</option>
                <option value="bebidas">Bebidas</option>
                <option value="pratos">Pratos</option>
                <option value="porcoes">Porçoes</option>
                <option value="lanches">Lanchers</option>
            </select>

            <label for="vehicle1"> Sugestão do Chef</label><br>
            <input type="checkbox" name="showcase" value="true">
        
        <label>Preço </label>
            <input type="number" name="price"/>
        <input type="submit" valur="Enviar">
    </form>
    <a href="<?=$base?>/edit_delete.php">Editar produtos</a>
</div>
    
