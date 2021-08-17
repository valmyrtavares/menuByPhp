<?php
class Attendance{
    public $id;
    public $datetime;
    public $store;
    public $inprogress;
    public $total;
    public $table;    
    public $token;    
}

interface AttendanceDAO{   
    public function insert($u);
}