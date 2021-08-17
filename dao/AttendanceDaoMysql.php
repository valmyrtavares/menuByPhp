<?php
    require_once 'models/Attendance.php';

    class Attendance implements AttendanceDAO{

        public function __construct(PDO $driver){
            $this->pdo = $driver;
        }
        
        public function insert($u){

        }
    }