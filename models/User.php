<?php
class User{
    public $id;
    public $name;
    public $store;
    public $email;
    public $type;
    public $password;    
    public $token;    
}

interface UserDAO{
    public function findByEmail($email);
    public function insert($u);
}