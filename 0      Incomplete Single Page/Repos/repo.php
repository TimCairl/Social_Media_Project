<?php
class Repository
{
    protected $connection;

    function __construct()
    {
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "social_media";
        $this->connection = new mysqli($server, $username, $password, $dbname);
    }
}
?>