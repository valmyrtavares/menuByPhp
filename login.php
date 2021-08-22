<?php
require 'partials/header.php';
?>
<div class="content-form-login">
    <h1> Fala o seu login</h1>
    <form class="form-send" method="POST" action="login_action.php" >
            <label>Email</label>
                <input type="email" name="email"/>
            <label>Senha</label>
                <input type="password" name="password"/>
            <input type="submit" value="Enviar" style="margin-top:20px;">
    </form>
    <a href="<?=$base?>/signup.php">Se não tem conta cadastre-se aqui</a>
</div>