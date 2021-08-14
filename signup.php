<?php
require 'partials/header.php';
?>
<div class="content-form-login">
    <h1> Fala o seu login</h1>
    <form class="form-send" method="POST" action="signup_action.php" >
            <label>Nome</label>
            <input type="text" name="name"/>
            <label>Estabelecimento</label>
            <input type="text" name="store"/>
            <label>Email</label>
            <input type="email" name="email"/>
            <label>Cargo</label>
            <select  name="type">
                <option value="" selected>Selecione o cargo</option>
                <option value="admin">Admin</option>
                <option value="funcionario">Funcionários</option>               
            </select>            
            <label>Senha</label>
            <input type="password" name="password"/>
            <input type="submit" value="Enviar">
    </form>
</div>