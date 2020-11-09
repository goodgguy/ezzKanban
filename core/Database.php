<?php
class Database
{
    public $conn;
    protected $servername = DB_SERVERNAME;
    protected $username = DB_USERNAME;
    protected $password = DB_PASSWORD;
    protected $dbname = DB_NAME;
    function __construct()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->conn, $this->dbname);
        mysqli_query($this->conn, "SET NAMES 'utf8'");
    }
}
