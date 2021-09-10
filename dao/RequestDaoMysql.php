<?php
require_once 'models/Request.php';




class RequestDaoMysql implements RequestDAO{

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }
    public function insert(Request $rq){
       
        $sql = $this->pdo->prepare("INSERT INTO request 
        (dat, mesa, name_customer, id_customer, token, id_product ,product_title, comment, price) VALUES
        (:dat,:mesa, :name_customer, :id_customer,:token, :id_product, :product_title, :comment, :price)");
        
       $sql->bindValue(':dat', $rq->dat);
        $sql->bindValue(':mesa', $rq->mesa);
        $sql->bindValue(':id_customer', $rq->id_customer);
        $sql->bindValue(':token', $rq->token);
        $sql->bindValue(':name_customer', $rq->name_customer);
        $sql->bindValue(':id_product', $rq->id_product);
       $sql->bindValue(':product_title',  $rq->product_title);       
       $sql->bindValue(':comment',  $rq->comment);       
       $sql->bindValue(':price', $rq->price);
       $sql->execute();
        
    }

    public function getRequests(){
        $array = [];
        $sql = $this->pdo->prepare("SELECT * FROM request
         ORDER BY mesa ASC");
         $sql->execute();
         
        if($sql->rowCount() > 0 ){
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        $array = $data;
        } 
        return $array;
    }

    public function findByToken($t){
        $sql = $this->pdo->prepare("SELECT * FROM request
        WHERE token = :token");
        $sql->bindValue(':token', $t);
        $sql->execute();
        if($sql->rowCount()>0){
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

    }
}

