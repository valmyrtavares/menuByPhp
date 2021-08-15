<?php
session_start();
$base = 'http://localhost/menu';
$user = true;

$db_name = 'menu';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'lord@God71';

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
