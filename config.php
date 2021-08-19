<?php
session_start();
//$base = 'http://localhost/menu';
$base = 'http://pratododia.pessoal.ws';
$user = true;

$db_name = 'menu_cardapio';
$db_host = 'menu_cardapio.mysql.dbaas.com.br';
$db_user = 'menu_cardapio';
$db_pass = 'FoodAndSucess';

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




// $db_name = 'menu';
// $db_host = 'localhost';
// $db_user = 'root';
// $db_pass = '';
