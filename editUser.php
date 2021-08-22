<?php
require_once 'config.php';
require 'partials/header.php';
require 'models/Auth.php';


$daoAuth = new Auth($pdo, $base);
$userInfo = $daoAuth->checkToken();

?>
<div class="content-form-login">
    <h1> Faça o seu cadastro</h1>
    <form class="form-send" method="POST" action="editUser_action.php" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?= $userInfo->id?>"/>
            <label>Nome</label>
            <input type="text" name="name" value="<?= $userInfo->name?>"/>
            <label>Estabelecimento</label>
            <input type="text" name="store" value="<?= $userInfo->store?>"/>
            <label>Imagem</label>
            <input type="file" name="cover"/>
            <label>Email</label>
            <input type="email" name="email" value="<?=$userInfo->email?>"/>
            <label>Cargo</label>
            <select  name="type">
                <option value="<?=$userInfo->type?>" selected><?=$userInfo->type?></option>
                <option value="admin">Admin</option>
                <option value="funcionario">Funcionários</option>               
            </select>            
            <label>Senha</label>
            <input type="password" name="password" value="<?=$userInfo->password?>"/>
            <input type="text" name="token" value="<?=$userInfo->token?>"/>
            <input type="submit" value="Enviar">
    </form>
</div>