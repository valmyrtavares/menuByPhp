<?php
require 'partials/header.php';
$table = filter_input(INPUT_GET, 'mesa');
echo $table;


?>

<div class="content-form-login-customer" style="margin-bottom:70vh;">
    <p>Se já é nosso cliente preencha seu número. Senão cadastre-se e ganhe uma bebida gratis</p>
    <form class="form-send" method="POST" action="login_action.php" >

        <?php if(!empty($_SESSION['nophone'])): ?>
            <p style="color:red"><?=$_SESSION['nophone'];?> </p>
            <?=$_SESSION['nophone'] = ""; ?>                
        <?php endif; ?>

                <label>Numero do Celular</label>
                <input type="text" id="phone-mask" name="phone"/>   
                <input type="hidden" name="type" value="client"/>
                 <input type="hidden" name="table" value="<?=$table?>"/> 
                <div> 
                    <input type="submit" value="Enviar">
                    <input type="submit" value="Pular">
                </div>        
    </form>
    <a href="<?=$base?>/signup_Customer.php">cadastre-se aqui</a>
</div>
<script src="https://unpkg.com/imask"></script>
<script>
    var phoneMask = IMask(
  document.getElementById('phone-mask'), {
    mask: '(00)00000-0000'
  }); 
</script>
<?php require 'partials/footer.php'?>