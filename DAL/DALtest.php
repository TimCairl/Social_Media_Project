<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "social_media";
    $connection = new mysqli($server, $username, $password, $dbname);
    $sql = "insert into users (username, password) values('test123', 'password123')";
    $connection->query($sql);
?>