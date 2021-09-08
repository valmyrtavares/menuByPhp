<?php

require_once 'config.php';
require_once 'dao/RequestDaoMysql.php';

$daoRequest = new RequestDaoMysql($pdo);
$infoRequest = $daoRequest->findByToken($_SESSION['tokenCustumer'] );
// echo '<pre>';
// print_r($infoRequest);
// exit;
$num = 0;
 foreach($infoRequest as $x){
    $num += $x['price'];
    }


?>
<div class="list-customer-content">
    <table>
        <tr>
            <th>item</th>
            <th>Valor</th>                     
        </tr>
        <?php foreach($infoRequest as $list):?>
        <tr>
            <td><?=$list['product_title']?></td>
            <td>$<?=$list['price']?>,00</td>                          
        </tr>
        <?php endforeach;?>
        <tr>
            <td style="font-weight:bold">Total da conta</td>
            <td><?=$num?>,00</td>                          
        </tr>
    </table>
</div>