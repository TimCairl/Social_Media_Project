<!DOCTYPE html>
<?php
session_start();

$_SESSION['viewID'] = $_SESSION['userID'];

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
?>

<html>

<?php
echo 
"<div id='search'>
<form action='../Services/serv_account_search.php'>
    Search for User by Username: <input type='text' name='username'><br>
<input type='submit' value='Search'>
</form>
";

if ($_SESSION['searchResults'] != null)
{
    for ($i = 0; $i < count($_SESSION['searchResults']); $i++)
    {
        if($_SESSION['searchResults'][$i]['isPublic'] == 0 or $_SESSION['searchResults'][$i]['userId'] == $_SESSION['userID'])
            continue;

        $fName = $_SESSION['searchResults'][$i]['firstName'];
        $lName = $_SESSION['searchResults'][$i]['lastName'];
        $id = $_SESSION['searchResults'][$i]['userId'];

        echo
        "<form>
          $fName $lName
          <button type='submit' name='friendID' formaction='../Services/serv_friend_goTo.php' formmethod='post' value='$id'>View Profile</button>
          <button type='submit' name='friendID' formaction='../Services/serv_friend_add.php' formmethod='post' value='$id'>Add Friend</button>
        </form>";

    //    echo $_SESSION['searchResults'][$i];
    //    echo "<br>";
    }
}

echo
"
</div>
==========================================================================================================
";


/*
End Controller Logic
*/


for ($i = 0; $i < count($UserModel->userFriends, 0); $i++)
{
    $Temp = $UserModel->userFriends[$i];
    if($Temp == null)
      break;
    $Temp = $UserRepository->pullUserFromDatabase($UserModel->userFriends[$i]);

    echo
    "<form>
        $Temp->userFirstName $Temp->userLastName
        <button type='submit' name='friendID' formaction='../Services/serv_friend_goTo.php' formmethod='post' value='$Temp->userID'>View Profile</button>
        <button type='submit' name='friendID' formaction='../Services/serv_friend_remove.php' formmethod='post' value='$Temp->userID'>Remove Friend</button>
    </form>";

    //echo '<a href="../Services/serv_friend_goTo.php?friendID='.$Temp->userID.'">'.$Temp->username.'</a>';
}
?>

<?php
/*
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
*/
?>

<form action="../View/page_feed.php">
  <input type="submit" value="Back to Feed">
</form>

<?php
/*
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">

  function goToFriend(friendID)
  {
    $.ajax(
      {
        type: "POST",
        url: '/Services/serv_friend_goTo.php',
        data: 'friendID='+friendID,
        success: function(res)
        {
          window.location="page_profile_view.php";
        }
      });
  }

</script>
*/
?>

</html>