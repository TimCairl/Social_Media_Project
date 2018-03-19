<!DOCTYPE html>
<html>
<?php
session_start();

$_SESSION['viewID'] = $_SESSION['userID'];
$_SESSION['searchResults'] = null;

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

function goToProfile($id)
{
  $_SESSION['viewID'] = $id;
  header('Location: '.'../View/page_profile_view.php');
}


echo "<title>".$AppSettingsModel->applicationName."</title>";

for ($i = 0; $i < count($UserModel->userFriends, 0); $i++)
{
    $Temp = $UserModel->userFriends[$i];
    if($Temp == null)
      break;
    $Temp = $UserRepository->pullUserFromDatabase($UserModel->userFriends[$i]);
    
    // Change this to a button... or not. I tried to and it didn't work.
    echo
    //"<button type='button' formaction='../Services/serv_friend_goTo.php' 
    //  formmethod='post' value='$Temp->userID'>$Temp->username</button>";
    
    "<form action='../Services/serv_friend_goTo.php' method='post'>
        <input name='friendID' value='$Temp->userID' size='1' readonly hidden>
        <input type='submit' value='$Temp->username'>
    </form>";

    //echo $Temp->username;
    //echo "<br>";
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

<form action="../View/searchBarTest.php">
  <input type="submit" value="[TEMP] Search 'Bar'">
</form>

<form action="../View/page_feed.php">
  <input type="submit" value="Back to Feed">
</form>

</html>