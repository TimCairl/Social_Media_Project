<html>
<body>

<?php

    //Should probably change this around since UserRepo already has a connection.

    require_once("../Repository/UserRepository.php");
    $UserRepo = new UserRepository();

    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "social_media";
    $connection = new mysqli($server, $username, $password, $dbname);

    if($connection->connect_error)
    {
        die("Connection Failed: " . $connection->connect_error);
    }

    if($UserRepo->get_ID_with_Username($_POST["username"]) != -1)
    {
        header('Location: '.'../View/page_createAccount.php');
        die();
    }

    $username = $_POST["username"];
    $password = $_POST["password"];
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $dob = $_POST["bday"];
    $privacy = $_POST["privacy"];
    $t = "-None-";

    $sql = "INSERT INTO users (username, password, firstName, lastName, dateOfBirth, bio, interest, job, employer, isSuspended, isPublic, profilePicture) 
    VALUES ('$username', '$password', '$fname', '$lname', '$dob', 'This is my page!', '$t', '$t', '$t', '0', '$privacy', '$t')";
    
    $connection->query($sql);

    /*
    if($connection->query($sql) === TRUE)
    {
        echo "New record created successfully";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $connection->error . "<br>";
    }
    */

    $connection->close();

    header('Location: '.'../View/page_front.php');
    die();
?>
</body>
</html>