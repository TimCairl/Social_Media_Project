<!DOCTYPE html>
<?php
    require_once("../Repos/repo_user.php");
    $UserRepo = new UserRepository();

    // Add error checking

    if($UserRepo->getUserIDWithUsername($_POST["username"]) != -1)
    {
        
    }
    else
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $fname = $_POST["firstname"];
        $lname = $_POST["lastname"];
        $dob = $_POST["bday"];

        $UserRepo->pushUserToDataBase($username, $password, $fname, $lname, $dob);

        header('Location: '.'serv_logIn_getView.php');
    }

?>