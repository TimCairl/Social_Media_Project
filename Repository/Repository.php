<?php
class Repository
{
    //create connection to sql
    protected $connection;
    
    function __construct()
    {
        //When an instance of this class is created this function is called.
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "social_media";
        $this->connection = new mysqli($server, $username, $password, $dbname);
    }

    function pushToDatabase()
    {
        //Template of this function that can be used for classes inheriting from this class.
        //$sql = "insert into users (username, password, firstName, lastName) values('test123', 'password123', 'Joe', 'Schmoe')";
        //$connection->query($sql);
    }

    function pullFromDatabase()
    {
        //Template of this function that can be used for classes inheriting from this class.
    }

    function __deconstruct()
    {
        //When the link is broken to an instance of this class, this method is called.
    }
}
?>