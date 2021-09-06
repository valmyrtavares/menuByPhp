<?php
require_once 'models/Request.php';
require_once 'config.php';
require_once 'models/Auth.php';


// echo'<pre>';
// print_r($infoCustomer);

class RequestDaoMysql implements RequestDAO{
    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }
    public function insert(Request $rq){
        $daoAuth = new Auth($this->pdo, $this->base);
        $infoCustomer = $daoAuth->checkTokenCustomer();

        echo '<pre>';
        print_r($rq);
        echo '<pre>';
         print_r($infoCustomer);
        exit;
    }

}