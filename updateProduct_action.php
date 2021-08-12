<?php
 require_once 'model/Product.php';
 require_once 'dao/ProductDaoMysql.php';
 require_once 'config.php';

 $productDao = new ProductDaoMysql($pdo);

 $id = filter_input(INPUT_POST, 'id');
$title = filter_input(INPUT_POST, 'title');
$subtitle = filter_input(INPUT_POST, 'subtitle');
$img = filter_input(INPUT_POST, 'currentName');
$type = filter_input(INPUT_POST, 'type');
$showcase = filter_input(INPUT_POST, 'showcase');
$price = filter_input(INPUT_POST, 'price');

//echo "SHOWCASE VEM NATURALEMNTE COMO       " .$showcase. "</br>";

if($showcase==""){     
    $showcase = 0;
}else{  
    $showcase = 1;
}

//echo $title. "   " .$subtitle. "    " .$img. "   " .$price. "  " .$type. "  " .$showcase;

$productEdit = new Product();


if(isset($_FILES['img']) && !empty($_FILES['img']['tmp_name'])){   

    $newImg = $_FILES['img'];

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
        
       // print_r($finalImage) print_r($image) Ambos dão o objeto vazio e o erro
       //aqui era a falta do ponto antes do jpg
       //print_r(imagejpeg);Isso também não fuciona só da pra conferir o arquivo
       //na pasta media
      
      
    }

    $productEdit->img = $imgName;
    
    $imageDeleted = 'media/products/'.$img;
    if(file_exists($imageDeleted)){
        unlink($imageDeleted);               
    }

}else{
    $productEdit->img = $img;
}






$productEdit->id = $id;
$productEdit->title = $title;
$productEdit->subtitle = $subtitle;
$productEdit->type = $type;
$productEdit->showcase = $showcase;
$productEdit->price = $price;





$daoProduct = new ProductDaoMysql($pdo);
$product = $daoProduct->update($productEdit);

if($product){
    header('Location: '.$base);
}else{
    header('Location: '.$base."/updateProduct.php");
}

