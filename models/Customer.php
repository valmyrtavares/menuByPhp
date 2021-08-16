<?php
class Customer{
    public $id;
    public $name;
    public $phone;
    public $email;    
    public $birthdate;    
    public $request;
    public $date;
    public $amountArrivals;    
}

interface CustomerDAO{    
    public function insert($u);
    public function getCustomers();
    
}