<?php
require_once 'dao/UserDaoMysql.php';
require_once 'dao/CustomerDaoMysql.php';

class Auth{
    private $pdo;
    private $base;
    private $dao;
    private $daoCustomer;

    public function __construct(PDO $pdo, $base){
        $this->pdo = $pdo;
        $this->base = $base;
        $this->dao = new UserDaoMysql($this->pdo);
        $this->daoCustomer = new CustomerDaoMysql($this->pdo);
    }

    public function checkToken(){

    }

    public function emailExist($email){
        return $this->dao->findByEmail($email)?true:false;
    }

    public function registerUser($name, $store, $email, $type, $password){

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $token = md5(time()).rand(0, 9999);
     
        $newUser = new User();
        $newUser->name = $name;
        $newUser->email = $email;
        $newUser->store = $store;
        $newUser->type = $type;
        $newUser->password = $hash;
        $newUser->token = $token;

        $this->dao->insert($newUser);
        $_SESSION['token'] = $token;
    }

    public function registerCustomer($name, $email, $phone, $birthdate){
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('America/Sao_Paulo'));
        $now = $date->format('d/m/Y H:i:s');        
        
        $newCustomer = new Customer();
        $newCustomer->name = $name;
        $newCustomer->email = $email;
        $newCustomer->phone = $phone;
        $newCustomer->birthdate = $birthdate;
        $newCustomer->date = $now;          
       

        $this->daoCustomer->insert($newCustomer);
        return true;
       
    }

    public function validateLogin($email, $password){
        $user = $this->dao->findByEmail($email);
       if($user){
            if(password_verify($password, $user->password)){

                    $token = md5(time().rand(0,9999));
                    $user->token = $token;
                    $this->dao->update($user);

                $_SESSION['token']=$token;
                return true;
            }
       }
    }




}