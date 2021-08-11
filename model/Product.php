<?php
class Product{
    public $id;
    public $title;
    public $subtitle;
    public $img;
    public $price;
    public $type;
    public $showcase;

}

 interface ProductDAO {
     public function getProducts();
     public function insert(Product $pr);
     public function delete($id);
     public function findById($id); 
     public function update(Product $id); 
 }