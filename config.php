<?php
session_start();

$user = true;

// $base = 'http://pratododia.pessoal.ws';
// $db_name = 'menu_cardapio';
// $db_host = 'menu_cardapio.mysql.dbaas.com.br';
// $db_user = 'menu_cardapio';
// $db_pass = 'FoodAndSucess';

$base = 'http://localhost/menu';
$db_name = 'menu';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$imgWidthGlobal = 600;
$imgHeightGlobal = 400;


//Valmyr#tavares1971lima

// ftp.pratododia.pessoal.ws
// pratododiapessoa1
// Valmyr#tavares1971lima
//FoodAndSucess
//http://pratododia.pessoal.ws/







