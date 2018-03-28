<!DOCTYPE html>
<?php
    session_start();
    $_SESSION['userID'] = -1;

    require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/Social_Media_Project/Repos/repo_appSettings.php");
    $AppSettingsRepository = new AppSettingsRepository();
    $AppSettingsModel = $AppSettingsRepository->pullSettingFromDatabase("applicationName");
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="CSS/main.css">
    </head>

    <body style="background-color:#4C4C47;" onload="logIn_getView()">
        <div id="titleBar" class="title">
            <?php echo $AppSettingsModel->settingValue ?>
        </div>

        <div id="navBar" style="display: none;">
            <div class='navBar'>
                <a href="../Services/serv_account_goTo.php">Profile</a>
                <a href="page_friends_view.php">Friends</a>
                <a href="page_feed.php">Feed</a>
                <a href="page_front.php" style="float:right">Log Out</a>
            </div>
        </div>

        <div id="viewBlock">
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="JavaScript/main.js"></script>

    </body>
</html>