<?php
require 'config.php';
require_once "models/Auth.php";
//require_once "dao/AttendanceDaoMysql.php";

$auth = new Auth($pdo, $base);
//$attendaceDao = new AttendanceDaoMysql($pdo);

$name =  filter_input(INPUT_POST, "name");
$store = filter_input(INPUT_POST, 'store');
$email = filter_input(INPUT_POST, 'email');
$type = filter_input(INPUT_POST, 'type');
$password = filter_input(INPUT_POST, 'password');
$phone = filter_input(INPUT_POST, 'phone');
$birthdate = filter_input(INPUT_POST, 'birthdate');
$table = filter_input(INPUT_POST, "table");

$mesa = ($table ? $table: 100);
$_SESSION['tableNumber']=$mesa;


if($type==="client"){
    if(!$name && !$phone){      
        $auth->registerCustomer("Desconhecido", "","",""); 
        header("Location: " .$base);
        exit;
    }else{
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
        $customerPhone = $auth->findByPhone($phone);
       if($customerPhone){
           $_SESSION['registerphone']="Esse número já foi cadastrado por " .$customerPhone['name']. 
           ' caso seja você, volte a tela anterior e faça seu login usando esse núdmeo';
           header('Location: ' .$base. '/signup_Customer.php');
            exit;          
       }


       $auth->registerCustomer($name, $email, $phone, $birthdate); 
       
       
       header("Location: " .$base);
       exit;
    }    
    
 
}else{
   
    if(isset($_FILES['cover']) && !empty($_FILES['cover']['tmp_name'])&& $type==="admin"){   
        

        $newImg = $_FILES['cover'];
    
        
        if(in_array($newImg['type'],['image/jpeg', 'image/jpg', 'image/png'])){
           
            $imgWidth = 525;
            $imgHeight = 350;
    
            list($widthOrigin, $heightOrigin)= getImagesize($newImg['tmp_name']);
            $ratio = $widthOrigin / $heightOrigin;
            
            $newWidth = $imgWidth;
            $newHeight = $newWidth / $ratio;
    
            if($newHeight < $imgHeight){
                $newHeight = $imgHeight;
                $newWidth = $newHeight * $ratio;
            }                      
    
            $x = $imgWidth - $newWidth;
            $y = $imgHeight - $newHeight;  
            
    
            $x = $x<0 ? $x/2: $x;
            $y = $y<0 ? $y/2 : $y;   
           
            
            $finalImage = imagecreatetruecolor($imgWidth, $imgHeight );   
            
           
            switch($newImg['type']){
                case 'image/jpeg':
                case 'image/jpg':
                    $image = imagecreatefromjpeg($newImg['tmp_name']);
                break;
                case 'image/png':
                    $image = imagecreatefrompng($newImg['tmp_name']);
                break;
            }
    
            imagecopyresampled(
                $finalImage, $image,
                $x,$y,0 ,0,
                $newWidth, $newHeight, $widthOrigin, $heightOrigin
            );            
    
            $imgName = md5(time().rand(0,9999)). '.jpg';
            imagejpeg($finalImage, $base.'./prod/'.$imgName, 100);  
            
                    
          
        }
     
    
    }else{
        $imgName = "semimagem";
    }
    
    
    if($name && $store && $email && $type && $password && $imgName){       
        if($auth->emailExist($email)===false){           
            $auth->registerUser($name, $store, $email, $type, $password, $imgName);
            header('Location: ' .$base);
            exit;
        }
        
        
    }else{
        $_SESSION['flash'] = 'Preencha todos os campos';
        header("Location: " . $base . "/signup.php");
        exit;
    }
}