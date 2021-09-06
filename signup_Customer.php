<?php
require 'partials/header.php';
$table = filter_input(INPUT_GET, 'mesa')
?>
<div class="content-form-login">
    <h1> Participe das nossas promoções e ganhe uma bebida de cortesia...</h1>
    <?php if(!empty($_SESSION['flash'])):?>
      <?=$_SESSION['flash']; ?>
      <?=$_SESSION['flash']=" ";?>
    <?php endif; ?>
    <?php echo"Essa é a Mesa = ".$table;?>
    <form class="form-send" method="POST" action="signup_action.php" >
            <label>Nome</label>
            <input type="text" name="name"/>
            <label>Whatsap</label>
            <input type="text" id="phone-mask" name="phone"/>
            <label>Email</label>
            <input type="text" name="email"/>    
            <label>Data do seu aniversário</label>
            <input type="text" name="birthdate" id="birthdate"/>            
           
            <input type="hidden" name="type" value="client"/>
            <input type="hidden" name="table" value="<?=$table?>"/> 
                  
           
            <div style="display:flex; width:70%">
              <input type="submit" value="Enviar">
              <input type="submit" value="Pular">
            </div>

    </form>
</div>
<script src="https://unpkg.com/imask"></script>
<script>
    var phoneMask = IMask(
  document.getElementById('phone-mask'), {
    mask: '(00)00000-0000'
  });
  IMask(
            document.getElementById('birthdate'),
            {mask:'00/00/0000'}
        );
</script>