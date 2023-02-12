<?php
// include("connection.php");

class Connection{

    private $conn = null;
    public function __construct(){
        $this->conn = mysqli_connect("localhost", "root", "root", "car-rental");
    }

    public function getConnection(){
        return $this->conn;
    }
}

?>