<?php
require 'partials/header.php';
require_once 'config.php';
require_once 'dao/RequestDaoMysql.php';

$daoRequest = new RequestDaoMysql($pdo);
$infoRequest = $daoRequest->getRequests();
// echo '<pre>';
// print_r($infoRequest);
// exit;
?>
<div class="list-customer-content">
    <table>
        <tr>
            <th>Pedido</th>
            <th>Mesa</th>
            <th>Cliente</th>
            <th>Produto</th>
            <th>Horário do pedido</th>          
        </tr>
        <?php foreach($infoRequest as $list):?>
        <tr>
            <td><?=$list['id']?></td>
            <td><?=$list['mesa']?></td>
            <td><?=$list['name_customer']?></td>
            <td><?=$list['product_title']?></td>
            <td><?=$list['dat']?></td>
                       
        </tr>
        <?php endforeach;?>
    </table>
</div>