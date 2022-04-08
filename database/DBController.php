<?php

class DBController
{
    //db connection properties
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = 'shops';

    public $conn = null;

    //Constructor
    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if($this->conn->connect_error) {
            echo "Fail" . $this->conn->connect_error;
        }
    }

    //Destructor
    public function __destruct()
    {
        $this->closeConnection();
    }

    protected function closeConnection() {
        if($this->conn != null) {
            $this->conn->close();
            $this->conn = null;
        }
    }
}

