<?php
require_once 'config.php';
//require_once 'model/Product.php';
require_once 'dao/ProductDaoMysql.php';

$title = filter_input(INPUT_POST, 'title');
$subtitle = filter_input(INPUT_POST, 'subtitle');
$img = filter_input(INPUT_POST, 'img');
$type = filter_input(INPUT_POST, 'type');
$price = filter_input(INPUT_POST, 'price');
$showcase = filter_input(INPUT_POST, 'showcase');

$showcase = $showcase ? 1:0;


//imagem de produtos

if(isset($_FILES['img']) && !empty($_FILES['img']['tmp_name'])){   

    $newImg = $_FILES['img'];

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
        //imagejpeg($finalImage, './media/products/'.$imgName, 100);
        imagejpeg($finalImage, '/media/products/'.$imgName, 100);
        
       // print_r($finalImage) print_r($image) Ambos dão o objeto vazio e o erro
       //aqui era a falta do ponto antes do jpg
       //print_r(imagejpeg);Isso também não fuciona só da pra conferir o arquivo
       //na pasta media
      
      
    } 

}




//echo $title. "   " .$subtitle. "    " .$imgName. "   " .$price. "  " .$type. "  " .$showcase;

if($title && $subtitle &&  $imgName && $type && $price){
    

   $daoProduct = new ProductDaoMysql($pdo);
    $newProduct = new Product();
    $newProduct->title = $title;
    $newProduct->subtitle = $subtitle;
    $newProduct->img = $imgName;
    $newProduct->type = $type;
    $newProduct->price = $price;
    $newProduct->showcase = $showcase;

   $daoProduct->insert($newProduct);
   header('Location: '.$base);
   
}else{
    $_SESSION['envio']= "Todos os campos precisam ser preenchidos";
    header('Location: '.$base. '/sendProduct.php');
}




