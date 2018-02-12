<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "social_media";
    $connection = new mysqli($server, $username, $password, $dbname);
    $sql = "insert into users (username, password, firstName, lastName) values('test123', 'password123', 'Joe', 'Schmoe')";
    $connection->query($sql);
?>