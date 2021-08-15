<?php
    require_once 'models/Customer.php';

class CustomerDaoMysql implements CustomerDAO {
    private $pdo;
    
    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }

    public function insert($u){
          
        $sql = $this->pdo->prepare("INSERT INTO customer 
        (name, email, phone, birthdate, date) 
        VALUES
        (:name, :email, :phone, :birthdate, :date)");
        $sql->bindValue(':name', $u->name);
        $sql->bindValue(':email', $u->email);
        $sql->bindValue(':phone', $u->phone);
        $sql->bindValue(':birthdate', $u->birthdate);       
        $sql->bindValue(':date', $u->date );
       
             
        $sql->execute();
        return true;
    }

}