<?php
class Request{
    public $id;
    public $dat;
    public $mesa;
    public $id_customer;
    public $name_customer;
    public $id_product;
    public $product_title;
    public $price;
    

}

 interface RequestDAO {
     public function getRequests();
     public function insert(Request $pr);
    //  public function delete($id);
    //  public function findById($id); 
    //  public function update(Product $id); 
 }