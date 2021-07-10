<?php

class DBController
{
    //database connection
    protected $host = "localhost";
    protected $username = "";
    protected $password = "";
    protected $database = "ecom_shopee";

    //connection property
    public $con = null;

    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if($this->con->connect_error){
            echo "Connection Failed".$this->con->connect_error;
        }
        // echo "Connection Successfull";
    }

    public function __destruct()
    {
        $this->closeConnection();
    }
    
    //creating closing connection
    protected function closeConnection(){
        if($this->con != null){
            $this->con->close();
            $this->con = null;
        }
    }
}

?>