<?php
session_start();

require_once("../Repository/UserRepository.php");
$UserRepo = new UserRepository();

$id = $UserRepo->get_ID_with_Username($_POST["username"]);
if($id == -1)
{
    header('Location: '.'../View/page_front.php');
    die();
}

$UserModel = $UserRepo->pullUserFromDatabase($id);
if($_POST["password"] != $UserModel->userPassword)
{
    header('Location: '.'../View/page_front.php');
    die();
}

$_SESSION['tempUserModel'] = 0;
$_SESSION['userID'] = $UserModel->userID;
$_SESSION['username'] = $UserModel->username; // May not need this


if($UserModel->userIsSuspended == 1)
{
    header('Location: '.'../View/page_reactivateAccount.php');
}

header('Location: '.'../View/page_feed.php');

?>