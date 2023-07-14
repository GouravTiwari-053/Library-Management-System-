<?php
class DataBase
{
    public $servername = "localhost"; // assigning localhost value in servername variable
    public $username = "root"; // assigning root value in username variable
    public $password = "";
    public $db = "lms"; // assigning a database name in db variable
    public $conn;

    public function __construct() //constructor to connect with database
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->db);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}
?>