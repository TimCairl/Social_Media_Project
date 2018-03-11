<!DOCTYPE html>
<html>
<?php
/*
Begin Controller Logic
*/
require_once("../Repository/AppSettingsRepository.php");
require_once("../Repository/UserRepository.php");

$AppSettingsRepository = new AppSettingsRepository();
$UserRepository = new UserRepository();

$AppSettingsModel = $AppSettingsRepository->pullAllFromDatabase();
$UserModel = $UserRepository->pullUserFromDatabase(1);
$UserModel->userFriends = $UserRepository->fetchFriends(1);
/*
End Controller Logic
*/
echo "<title>".$AppSettingsModel->applicationName."</title>";

for ($i = 0; $i < count($UserModel->userFriends, 0); $i++)
{
    $Temp = $UserRepository->pullUserFromDatabase($UserModel->userFriends[$i]);
    echo $Temp->username;
    echo "<br>";
}
?>
</html>