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
            <input type="submit" value="Enviar">
    </form>
</div>