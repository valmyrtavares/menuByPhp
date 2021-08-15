<?php
require 'config.php';
require_once "models/Auth.php";

$name =  filter_input(INPUT_POST, "name");
$store = filter_input(INPUT_POST, 'store');
$email = filter_input(INPUT_POST, 'email');
$type = filter_input(INPUT_POST, 'type');
$password = filter_input(INPUT_POST, 'password');
$phone = filter_input(INPUT_POST, 'phone');
$birthdate = filter_input(INPUT_POST, 'birthdate');

$auth = new Auth($pdo, $base);

if($type=='client'){    
    $auth->registerCustomer($name, $email, $phone, $birthdate); 
    exit;   
}else{
    echo "Não é cliente";
    exit;
}

//echo $name. "   " .$store. "   " .$email. "   " .$type. "   " .$password;

if($name && $store && $email && $type && $password){
   
    if($auth->emailExist($email)===false){     
        $auth->registerUser($name, $store, $email, $type, $password);
        header('Location: ' .$base);
        exit;
    }
    

}else{
    $_SESSION['flash'] = 'Preencha todos os campos';
    header("Location: " . $base . "/signup.php");
    exit;
}