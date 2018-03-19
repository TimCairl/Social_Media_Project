<?php
session_start();
require_once('../Repository/UserRepository.php');

$UserRepository = new UserRepository();
$searchResults = array();
$usersFound = $UserRepository->searchUsersByUsername($_GET['username']);

for ($i = 0; $i < count($usersFound); $i++)
{
    array_push($searchResults, $usersFound[$i]);
}
$_SESSION['searchResults'] = $searchResults;

header('Location: '.'../View/searchBarTest.php');
die();
?>