<?php
require 'config.php';
require_once "models/Auth.php";

$auth = new Auth($pdo, $base);

$name =  filter_input(INPUT_POST, "name");
$store = filter_input(INPUT_POST, 'store');
$email = filter_input(INPUT_POST, 'email');
$type = filter_input(INPUT_POST, 'type');
$password = filter_input(INPUT_POST, 'password');
$phone = filter_input(INPUT_POST, 'phone');
$birthdate = filter_input(INPUT_POST, 'birthdate');
$table = filter_input(INPUT_POST, "table");

if($type=="client"){
    if(!$name && !$phone){      
      $auth->registerCustomer("Desconhecido", "","",""); 
      header("Location: " .$base);
      exit;
    }
    $birthdate = explode('/', $birthdate);
    if(count($birthdate)!=3){
        $_SESSION['flash'] = "Data de nascimento incompleta";
        header("Location: " .$base. "/signup_Customer.php");
        
    }
    $birthdate = $birthdate[2].'-' .$birthdate[1]. '-' .$birthdate[0];
   if(strtotime($birthdate)===false){
       $_SESSION['flash'] = $birthdate. 'Não é uma data de aniversário válida';
       header("Location: " .$base. "/signup_Customer.php");
       exit;
   } 
    $auth->registerCustomer($name, $email, $phone, $birthdate); 
    header("Location: " .$base);
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