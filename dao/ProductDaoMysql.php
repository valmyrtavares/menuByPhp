<?php
require_once 'models/Product.php';


class ProductDaoMysql implements ProductDAO {

    public function __construct(PDO $driver){
        $this->pdo = $driver; 
    }

    public function getProducts(){
        $array = [];
        $sql = $this->pdo->query("SELECT * FROM products
        ORDER BY id DESC");
        $sql->execute();

        if($sql->rowCount() > 0 ){
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            $array = $data;
        }        
        return $array;
    }

    public function insert(Product $pr){
       $sql = $this->pdo->prepare("INSERT INTO products
       (title, subtitle, img, type, price, showcase) VALUES
       (:title, :subtitle, :img,:type, :price, :showcase)");
       $sql->bindValue(':title', $pr->title);
       $sql->bindValue(':subtitle', $pr->subtitle);
       $sql->bindValue(':img', $pr->img);
       $sql->bindValue(':type', $pr->type);
       $sql->bindValue(':showcase', $pr->showcase);
       $sql->bindValue(':price', $pr->price);
       $sql->execute();
    }

    public function delete($id){       

        $sql = $this->pdo->query("SELECT img FROM products WHERE id = $id");        
        $sql->execute();
        if($sql->rowCount() > 0){          
            $data = $sql->fetch(PDO::FETCH_ASSOC);            
            $img = __DIR__. 'media/products/'.$data['img'];
            if(file_exists($img)){
                unlink($img);               
            }
        }

        $sql = $this->pdo->prepare("DELETE FROM products WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();     
        return true;
    }

    public function findById($id){
        $sql = $this->pdo->prepare("SELECT * FROM products WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            $product = $this->generateProduct($data);          
            return $product;
        }
    }

    private function generateProduct($array){
        $pr = new Product();
        $pr->title = $array['title']??'';
        $pr->subtitle = $array['subtitle']??'';
        $pr->img = $array['img']??'';
        $pr->type = $array['type']??'';
        $pr->showcase = $array['showcase']??'';
        $pr->price = $array['price']??'';
        return $pr;
    }

    public function update(Product $pr){
        $sql = $this->pdo->prepare("UPDATE products SET
        title = :title,
        subtitle = :subtitle,
        img = :img,
        type = :type,
        price = :price,
        showcase = :showcase
        WHERE  id = :id");
        $sql->bindValue(':id', $pr->id);
        $sql->bindValue(':title', $pr->title);
        $sql->bindValue(':subtitle', $pr->subtitle);
        $sql->bindValue(':img', $pr->img);
        $sql->bindValue(':type', $pr->type);
        $sql->bindValue(':price', $pr->price);
        $sql->bindValue(':showcase', $pr->showcase);
        
      
        $sql->execute();
       
       


        return true;
     }
    
}

