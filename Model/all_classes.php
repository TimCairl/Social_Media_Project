//Temporary file to hold all classes that would be instansiated until a pattern of similar classes is noticed.
//Once a pattern on similar classes is noticed then take them out of this file into a new one with proper naming.
<?php
    class sqlconnection
    {
        //create connection to sql
        private $conn;
        
        function __construct()
        {
            $server = "localhost";
            $username = "root";
            $password = "";
            $dbname = "social_media";
            $this->conn = new mysqli($server, $username, $password, $dbname);
        }

        function __deconstruct()
        {
            
        }
    }
?>