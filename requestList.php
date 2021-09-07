<?php
require 'partials/header.php';
require_once 'config.php';
require_once 'dao/RequestDaoMysql.php';

$daoRequest = new RequestDaoMysql($pdo);
$infoRequest = $daoRequest->getRequests();
echo '<pre>';
print_r($infoRequest);
exit;
