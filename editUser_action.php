<?php
require_once 'config.php';
require_once "dao/UserDaoMysql.php";
require_once 'models/Auth.php';

$userDao = new UserDaoMysql($pdo);


$daoAuth = new Auth($pdo, $base);
$UserInfo = $daoAuth->checkToken();



 $id = filter_input(INPUT_POST, 'id');
 $name = filter_input(INPUT_POST, 'name');
 $store = filter_input(INPUT_POST, 'store');
 $email= filter_input(INPUT_POST, 'email');
 $type = filter_input(INPUT_POST, 'type');
 $password = filter_input(INPUT_POST, 'password');
 $cover ="semimagem";
 $token = filter_input(INPUT_POST, "token");

 //echo  $id. "  " .$name. "   " .$store. "   "  .$cover. "   "  .$email. "   "  .$password. " " .$token;
 
 
 
 //imagem do header
    if(isset($_FILES['cover']) && !empty($_FILES['cover']['tmp_name'])){   
        $newImg = $_FILES['cover'];
        

        if(in_array($newImg['type'],['image/jpeg', 'image/jpg', 'image/png'])){
        
            $imgWidth = 525;
            $imgHeight = 200;

            list($widthOrigin, $heightOrigin)= getImagesize($newImg['tmp_name']);
            $ratio = $widthOrigin / $heightOrigin;
            
            $newWidth = $imgWidth;
            $newHeight = $newWidth / $ratio;

            if($newHeight < $imgHeight){
                $newHeight = $imgHeight;
                $newWidth = $newHeight * $ratio;
            }
            // echo "widthOrigin   " .$widthOrigin. "  heightOrigin  " .$heightOrigin. "  ratio  " .$ratio. "</br>";
            // echo "newWidth   " .$newWidth. "  newHeight  " .$newHeight;
            // widthOrigin 1200 heightOrigin 628 ratio 1.9108280254777
            // newWidth 382.16560509554 newHeight 200         

            $x = $imgWidth - $newWidth;
            $y = $imgHeight - $newHeight;

            // echo " x= " .$x. " y= " .$y. "</br>";
            // x= -32.165605095541 y= 0

            $x = $x<0 ? $x/2: $x;
            $y = $y<0 ? $y/2 : $y;

            // echo " x= " .$x. " y= " .$y. "</br>";
            // x= -16.082802547771 y= 0
            
            $finalImage = imagecreatetruecolor($imgWidth, $imgHeight );
            
            // print_r($finalImage); não adianta volta um objeto vazio GdImage Object ( )
            

            
            //$newImg é o nome do arquivo inicial la encima
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
            // imagejpeg($finalImage, './prod/'.$imgName, 100);      
            imagejpeg($finalImage,  './prod/' .$imgName, 100);  
          

        }
    
        // $_SESSION['cover'] = $imgName;
        // header('Location:' .$base);
    }
 
   
        
        
    $UserInfo = new User();

    $UserInfo->id = $id;
    $UserInfo->name = $name;
    $UserInfo->store = $store;
    $UserInfo->email = $email;
    $UserInfo->type = $type;
    $UserInfo->password = $password;
    $UserInfo->cover = $imgName;
    $UserInfo->token = $token;
 

    if($userDao->update($UserInfo)){
        header("Location: ".$base);
            exit;
    }else{
        header("Location: ".$base. "/editUser.php");
        exit;
    }
   

 