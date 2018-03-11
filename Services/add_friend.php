<?php
require_once("../Repository/UserRepository.php");
$UserRepository = new UserRepository();
if ($UserRepository->get_ID_with_Username($_GET['fname']) != -1)
{
    $UserRepository->addFriend(1, $UserRepository->get_ID_with_Username($_GET['fname']));//magic number one for example
}
else
{
    //no such user
}
?>