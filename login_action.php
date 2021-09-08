<?php
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/CustomerDaoMysql.php';

$email =  filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, 'password');
$type = filter_input(INPUT_POST, 'type');
$phone = filter_input(INPUT_POST, 'phone');
$table = filter_input(INPUT_POST, 'table');

$mesa = ($table ? $table: 100);
$_SESSION['tableNumber']=$mesa;


if($type==='client'){
    if(!$phone){
        $auth = new Auth($pdo, $base);
        $auth->registerCustomer("Desconhecido", "","",""); 
        header("Location: " .$base);
        exit;
    }else{
        $daoCustomer = new CustomerDaoMysql($pdo);
        $customer = $daoCustomer->findByPhone($phone);
        if($customer){              
            $_SESSION['tokenCustumer'] = $customer['token'];         
            header('Location:'.$base);
            exit;
        }else{
             $_SESSION['nophone']="Seu número não está cadastrado, tente de novo ou cadatre-se";
             header('Location: '.$base. '/loginCustomer.php');      
            exit;
        }
    }

 
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
