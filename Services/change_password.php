<?php
require_once("../Repository/UserRepository.php");
$UserRepository = new UserRepository();
if (true)//add check to see if it can be changed
{
    //changes password
    $UserRepository->changePassword(1, $_GET['newPassword']);//magic number one for example
}
else
{
    //password is same as before
}
?>