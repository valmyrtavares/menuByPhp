<?php
require_once 'models/Request.php';




class RequestDaoMysql implements RequestDAO{

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }
    public function insert(Request $rq){
       
        $sql = $this->pdo->prepare("INSERT INTO request 
        (dat, mesa, id_customer, id_product ,product_title, price) VALUES
        (:dat,:mesa, :id_customer, :id_product, :product_title, :price)");
        
       $sql->bindValue(':dat', $rq->dat);
        $sql->bindValue(':mesa', $rq->mesa);
        $sql->bindValue(':id_customer', $rq->id_customer);
        $sql->bindValue(':id_product', $rq->id_product);
       $sql->bindValue(':product_title', "sdf ");       
       $sql->bindValue(':price', $rq->price);
       $sql->execute();
        
    }

}

