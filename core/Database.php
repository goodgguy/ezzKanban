<?php
class Database
{
    public $conn;
    protected $servername = "localhost:3306";
    protected $username = "root";
    protected $password = "123456";
    protected $dbname = "ql_kanban";
    function __construct()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->conn, $this->dbname);
        mysqli_query($this->conn, "SET NAMES 'utf8'");
    }
}
