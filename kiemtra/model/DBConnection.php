<?php

namespace connected;

use PDO;


class DBConnection
{
    public $useName;
    public $password;
    public function __construct()
    {
        $this->useName = 'root';
        $this->password = 'Adda@12354';
    }
    public function connect(){
        $conn = null;
        try {
            $conn = new PDO("mysql:host=localhost;dbname=kiemtra",$this->useName,$this->password);
        } catch (PDOException $e){
            return $e->getMessage();
        }
        return $conn;
    }

}