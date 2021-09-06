<?php
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/CustomerDaoMysql.php';

$email =  filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, 'password');
$type = filter_input(INPUT_POST, 'type');
$phone = filter_input(INPUT_POST, 'phone');
$table = filter_input(INPUT_POST, 'table');

if($type==='client'){
    $daoCustomer = new CustomerDaoMysql($pdo);
    $customer = $daoCustomer->findByPhone($phone);
    if($customer){
        // $_SESSION['tokenCustumer'] = $customer['token'];
        // header('Location: '.$base);
        echo "Tem customer";
        exit;
    }else{
         $_SESSION['nophone']="Seu número não está cadastrado, tente de novo ou cadatre-se";
         header('Location: '.$base. '/loginCustomer.php');
      
       
        exit;
    }
    print_r($customer). '<br/>';
    exit;

    echo $type. '<br/>';
    echo $phone. '<br/>';
    echo $table; 
    exit;
}
if($email && $password){

    $auth = new Auth($pdo, $base);

    if($auth->validateLogin($email, $password)){     
        header('Location: '.$base);
        exit;
    }

}
$_SESSION['flash'] = 'Email e/ou senhas errados';
header("Location: ".$base. "/login.php");
exit;
