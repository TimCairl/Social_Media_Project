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

$_SESSION['tempUserModel'] = 0;               //may not need this (not currently used)
$_SESSION['userID'] = $UserModel->userID;
$_SESSION['viewID'] = $UserModel->userID;     //This will change if a user visits a friend's page.
$_SESSION['username'] = $UserModel->username; // May not need this
$_SESSION['searchResults'] = null;


if($UserModel->userIsSuspended == '1')
{
    header('Location: '.'../View/page_account_reactivate.php');
    die();
}

header('Location: '.'../View/page_feed.php');
die();
?>