<?php

class Connection
{
    private $servername;
    private $user;
    private $password;
    private $db;

    public $connection;

    function __construct()
    {
        $this->servername="127.0.0.1";
        $this->user = "root";
        $this->password = "sistemas";
        $this->db = "empresa";
        $this->connection  = new PDO("mysql:host=$this->servername;dbname=$this->db", $this->user, $this->password);

        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    }
}
