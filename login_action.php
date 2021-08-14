<?php
require_once 'config.php';
require_once 'models/Auth.php';

$email =  filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, 'password');

//echo $email. "   " .$password;

if($email && $password){

    $auth = new Auth($pdo, $base);

    if($auth->validateLogin($email, $password)){     
        header('Location: '.$base);
    }

}


exit;