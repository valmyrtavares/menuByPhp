<?php
require_once 'config.php';
require_once 'dao/CustomerDaoMysql.php';
require 'partials/header.php';

$customerList = new CustomerDaoMysql($pdo);
$lists = $customerList->getCustomers();


?>
<div class="list-customer-content">
    <table>
        <tr>
            <th>Nome</th>
            <th>Celular</th>
            <th>Email</th>
            <th>Aniversário</th>          
        </tr>
        <?php foreach($lists as $list):?>
        <tr>
            <td><?=$list['name']?></td>
            <td><?=$list['phone']?></td>
            <td><?=$list['email']?></td>
            <td><?=$list['birthdate']?></td>
                       
        </tr>
        <?php endforeach;?>
    </table>
</div>