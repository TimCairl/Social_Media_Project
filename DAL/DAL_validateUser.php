<?php

require_once("../Repository/UserRepository.php");
$UserRepo = new UserRepository();
$UserModel = $UserRepo->pullUserFromDatabase(11);

echo $UserModel->userID;
echo $UserModel->username;


?>