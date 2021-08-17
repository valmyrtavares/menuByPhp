<?php
require_once 'config.php';

$imageDeleted = 'media/products/'.$_SESSION['cover'];
echo $imageDeleted;

if(file_exists($imageDeleted)){   
    unlink($imageDeleted);               
}
$_SESSION['cover'] = "";
header('Location:' .$base);


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
        imagejpeg($finalImage, './media/products/'.$imgName, 100);      
      
      
      
    }
 
    $_SESSION['cover'] = $imgName;
    header('Location:' .$base);
}