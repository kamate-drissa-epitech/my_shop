<?php
class db_connect
{
    public $host;
    public $dbname;
    public $db_port;
    public $db_username;
    public $db_password;


    function __construct($host, $dbname, $db_port, $db_username, $db_password)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->db_port = $db_port;
        $this->db_username = $db_username;
        $this->db_password = $db_password;
    }


    function connection()
    {
        try {
            return new PDO("mysql:host={$this->host};dbname={$this->dbname};port={$this->db_port}", $this->db_username, $this->db_password);
        } catch (\Throwable $e) {
            echo "PDO ERROR {$e->getMessage()}";
        }
    }


}
