<html>
<body>

<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "social_media";
    $connection = new mysqli($server, $username, $password, $dbname);


    if($connection->connect_error)
    {
        die("Connection Failed: " . $connection->connect_error);
    }

    $username = $_POST["username"];
    $password = $_POST["password"];
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $dob = $_POST["bday"];
    $privacy = $_POST["privacy"];
    $t = "-None-";

    $sql = "INSERT INTO users (username, password, firstName, lastName, dateOfBirth, bio, interest, job, employeer, isSuspended, isPublic, profilePicture) 
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