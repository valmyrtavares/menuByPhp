<?php
class Request{
    public $id;
    public $date;
    public $table;
    public $id_product;
    public $id_customer;
    public $attendance;
    public $showcase;

}

 interface RequestDAO {
     public function getProducts();
     public function insert(Product $pr);
     public function delete($id);
     public function findById($id); 
     public function update(Product $id); 
 }