<!DOCTYPE html>
<?php
    require_once("../Repository/UserRepository.php");
    $UserRepo = new UserRepository();

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

    $UserRepo->pushUserToDataBase($username, $password, $fname, $lname, $dob, $privacy);

    header('Location: '.'../View/page_front.php');
    die();
?>