<?php
class User{
    public $id;
    public $name;
    public $store;
    public $email;
    public $type;
    public $password;    
    public $cover;
    public $token;    
}

interface UserDAO{
    public function findByEmail($email);
    public function insert(User $u);
    public function update(User $u);
}