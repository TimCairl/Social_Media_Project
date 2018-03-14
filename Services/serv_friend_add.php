<?php
session_start();

require_once("../Repository/UserRepository.php");
$UserRepository = new UserRepository();
if ($UserRepository->get_ID_with_Username($_GET['username']) != -1)
{
    $UserRepository->addFriend($_SESSION['userID'], $UserRepository->get_ID_with_Username($_GET['username']));//magic number one for example
}
else
{
    //no such user
}
header('Location: '.'../View/page_friends_view.php');
die();
?>