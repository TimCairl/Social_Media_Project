<!DOCTYPE html>
<html>
<?php
session_start();


/*
Begin Controller Logic
*/
require_once("../Repository/AppSettingsRepository.php");
require_once("../Repository/UserRepository.php");

$AppSettingsRepository = new AppSettingsRepository();
$UserRepository = new UserRepository();

$AppSettingsModel = $AppSettingsRepository->pullAllFromDatabase();
$UserModel = $UserRepository->pullUserFromDatabase($_SESSION['userID']);
$UserModel->userFriends = $UserRepository->fetchFriends($_SESSION['userID']);
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

<br><br><br>
<form action="../Services/serv_friend_add.php">
  Friend Username to add: <input type="text" name="username"><br>
  <input type="submit" value="Add to friend list">
</form>

<br><br><br>

<form action="../Services/serv_friend_remove.php">
  Friend Username to remove: <input type="text" name="username"><br>
  <input type="submit" value="Remove from friend list">
</form>

<form action="../View/page_feed.php">
  <input type="submit" value="Back to Feed">
</form>

</html>