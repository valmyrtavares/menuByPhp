<?php

require_once 'config.php';
require_once 'dao/RequestDaoMysql.php';
require 'partials/header.php';


$daoRequest = new RequestDaoMysql($pdo);
$infoRequest = $daoRequest->getRequests($_SESSION['tokenCustumer'] );

$num = 0;
 foreach($infoRequest as $x){
    $num += $x['price'];
}

?>
<div class="list-customer-content">
    <table>
    <tr>
        <th>Mesa</th>
        <th>Cliente</th>
        <th>item</th>
        <th>Valor</th>    
        <th>Tempo</th>                 
    </tr>
    <?php foreach($infoRequest as $list):?>
    <tr>
        <td><?=$list['mesa']?></td>
        <td><?=$list['name_customer']?></td>   
        <td><?=$list['product_title']?></td>   
        <td>$<?=$list['price']?>,00</td>   
        <td><?=$list['dat']?></td>   
                
    </tr>
    <?php endforeach;?>
    <tr>
        <td style="font-weight:bold">Total da conta</td>
        <td><?=$num?>,00</td>                          
    </tr>
    </table>
</div>