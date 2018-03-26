<?php
    session_start();

    require_once("../Repository/AppSettingsRepository.php");
    require_once("../Repository/UserRepository.php");

    $AppSettingsRepository = new AppSettingsRepository();
    $UserRepository = new UserRepository();

    $AppSettings = $AppSettingsRepository->pullAllFromDatabase();
    $UserModel = $UserRepository->pullUserFromDatabase($_SESSION['userID']);
    $UserModel->userFriends = $UserRepository->fetchFriends($_SESSION['userID']);
?>
<head>
        <link rel="stylesheet" type="text/css" href="../CSS/styles.css">
    </head>

    <body class='BG_LGrey'>
        <div class='BG_Blue'><br></div>
        <div class='BG_DGrey title'>
        <?php echo $AppSettings->applicationName ?> <br>
        </div>

<form action="../Services/serv_account_search.php">
    Search for User by Username: <input type="text" name="username"><br>
<input type="submit" value="Search">
</form>

<?php


if ($_SESSION['searchResults'] != null)
{
    echo "Session searchResults length: ".count($_SESSION['searchResults']);
    echo "<br>";
    for ($i = 0; $i < count($_SESSION['searchResults']); $i++)
    {
        if($_SESSION['searchResults'][$i]['isPublic'] == 0 or $_SESSION['searchResults'][$i]['userId'] == $_SESSION['userID'])
            continue;

        echo
        "<form action='../Services/serv_friend_goTo.php' method='post'>
            <input name='friendID' value='".$_SESSION['searchResults'][$i]['userId']."' size='1' readonly hidden>
            <input type='submit' value='".$_SESSION['searchResults'][$i]['username']."'>
        </form>"; 

    //    echo $_SESSION['searchResults'][$i];
    //    echo "<br>";
    }
}
else
{
    echo "No Users were found";
}
?>

<form action='page_friends_view.php'>
    <input type='submit' value='Back to Friends'>
</form>