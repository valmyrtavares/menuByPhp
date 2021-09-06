<?php
    require_once 'models/Customer.php';

class CustomerDaoMysql implements CustomerDAO {
    private $pdo;
    
    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }

    public function insert($u){
         
        $sql = $this->pdo->prepare("INSERT INTO customer 
        (name, email, phone, birthdate, date, token) 
        VALUES
        (:name, :email, :phone, :birthdate, :date, :token)");
        $sql->bindValue(':name', $u->name);
        $sql->bindValue(':email', $u->email);
        $sql->bindValue(':phone', $u->phone);
        $sql->bindValue(':birthdate', $u->birthdate);       
        $sql->bindValue(':date', $u->date );
        $sql->bindValue(':token', $u->token );
       
             
        $sql->execute();
        return true;
    }

    public function getCustomers(){
        $sql = $this->pdo->query("SELECT * FROM customer");
        $sql->execute(); 
        if($sql->rowCount()>0){
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
           return $data;
        }
    }
    public function checkTokenCustomer($t){       
        $sql = $this->pdo->prepare("SELECT * FROM customer WHERE token = :token");
        $sql->bindValue(':token', $t);
        $sql->execute();
        if($sql->rowCount()>0){
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        return false;

    }
    public function findByPhone($p){
        $sql = $this->pdo->prepare("SELECT * FROM customer WHERE phone = :phone");
        $sql->bindValue(':phone', $p);
        $sql->execute();
        if($sql->rowCount()>0){
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
    }

}