<?php
session_start();

require_once("../Repository/UserRepository.php");
$UserRepository = new UserRepository();

/*
if ($UserRepository->get_ID_with_Username($_GET['username']) != -1)
{
    $UserRepository->removeFriend($_SESSION['userID'], $UserRepository->get_ID_with_Username($_GET['username']));//magic number one for example
}
else
{
    //no such user
}
*/

$UserModel = $UserRepository->pullUserFromDatabase($_POST['friendID']);
if($UserModel->userID != null)
{
    $UserRepository->removeFriend($_SESSION['userID'], $UserModel->userID);
}

header('Location: '.'../View/page_friends_view.php');
die();
?>