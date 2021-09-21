<?php

require_once 'config.php';
require_once 'dao/RequestDaoMysql.php';

$daoRequest = new RequestDaoMysql($pdo);
$infoRequest = $daoRequest->findByToken($_SESSION['tokenCustumer'] );

$num = 0;
if (!empty($infoRequest)) {
    foreach ($infoRequest as $x) {
        $num += $x['price'];
    }
}    
?>
<div class="list-customer-content">
    <table>
        <tr>
            <th>item</th>
            <th>Valor</th>                     
        </tr>
        <?php if(!empty($infoRequest )): ?>
            <?php foreach($infoRequest as $list):?>
            <tr>
                <td><?=$list['product_title']?></td>
                <td>$<?=$list['price']?>,00</td>   
                        
            </tr>
            <?php endforeach;?>
        <?php endif; ?>    
        <tr>
            <td style="font-weight:bold">Total da conta</td>
            <td><?=$num?>,00</td>                          
        </tr>
    </table>
</div>