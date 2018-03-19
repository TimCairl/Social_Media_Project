<?php
session_start();
require_once('../Repository/UserRepository.php');

$UserRepository = new UserRepository();
$_SESSION['searchResults'] = array();
$usersFound = $UserRepository->searchUsersByUsername($_GET['username']);

for ($i = 0; $i < count($usersFound); $i++)
{
    array_push($_SESSION['searchResults'], $usersFound[$i]);
}

header('Location: '.'../View/searchBarTest.php');
die();
?>