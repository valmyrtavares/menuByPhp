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
                <option value="suco">Sucos</option>                
                <option value="refrigerante">Refrigerante</option>
                <option value="vinhos">Vinhos</option>
                <option value="cervejas">Cervejas</option>
                <option value="drinks">Drinks</option>
                <option value="carnes">Carnes</option>
                <option value="peixes">Peixes</option>
                <option value="frutosdomar">Frutos do mar</option>
                <option value="caseira">Comida Caseira</option>
                <option value="porcoes">Porçoes</option>
                <option value="lancesTradicionais">Lanchers Tradicionais</option>
                <option value="lanchesEspeciais">Lanchers Especiais</option>
            </select>
            <div class="check">
                <input type="checkbox" name="showcase" value="true">
                <label for="vehicle1"> Sugestão do Chef</label><br>
            </div>
        <label>Preço </label>
            <input type="number" name="price"/>
        <input type="submit" value="Enviar">
    </form>
   

    <a href="<?=$base?>/edit_delete.php">Editar produtos</a>
</div>
    
