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
        <th >Mesa</th>
        <th>Cliente</th>
        <th>item</th>
        <th class="hidden">Valor</th>    
        <th>Detalhe</th>    
        <th class="hidden">Tempo</th>           
        <th class="hidden">Excluir</th>      
        <th class="hidden">Editar</th>      
    </tr>
    <?php foreach($infoRequest as $list):?>
    <tr>
        <td><?=$list['mesa']?></td>
        <td><?=$list['name_customer']?></td>   
        <td><?=$list['product_title']?></td>   
        <td class="hidden">$<?=$list['price']?>,00</td>   
        <td><?=$list['comment']?></td>   
        <td class="hidden"><?=$list['dat']?></td>   
        <td class="hidden">
            <form method="POST" action="edit_delete_request_action.php">
                <input type=submit value="Excluir"/>
                <input type='hidden' name="id_delete" value="<?=$list['id']?>"/>
            </form>
        </td>   
        <td class="hidden">
            <form method="POST" action="edit_delete_request_action.php">
                <input type=submit value="Editar"/>
                <input type='hidden' name="id_edit" value="<?=$list['id']?>"/>
            </form>
        </td>  
                
    </tr>
    <?php endforeach;?>
    <tr>
        <td style="font-weight:bold">Total da conta</td>
        <td><?=$num?>,00</td>                          
    </tr>
    </table>
</div>