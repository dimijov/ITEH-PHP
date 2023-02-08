<?php
class DB
{
    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $db = "ordinacija";
    public $connection;

    function __construct()
    {
        $this->poveziSeSaBazom();
    }

    function poveziSeSaBazom()
    {
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->db);
    }
}