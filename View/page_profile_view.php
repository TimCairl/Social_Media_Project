<?php
    session_start();

    require_once("../Repository/AppSettingsRepository.php");
    require_once("../Repository/UserRepository.php");
    
    $AppSettingsRepository = new AppSettingsRepository();
    $UserRepository = new UserRepository();
    
    $AppSettingsModel = $AppSettingsRepository->pullAllFromDatabase();
    $UserModel = $UserRepository->pullUserFromDatabase($_SESSION['viewID']);
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../CSS/styles.css">
    </head>

    <body class='BG_LGrey'>
        <div class='BG_Blue'><br></div>
        <div class='BG_DGrey title'>
            <?php echo $AppSettingsModel->applicationName ?> <br>
        </div>

        <?php
            if($_SESSION['viewID'] == $_SESSION['userID'])
            {
                echo
                "<form action='page_profile_edit.php'>
                    <input type='submit' value='Edit Account'>
                </form>
                
                <form action='page_feed.php'>
                    <input type='submit' value='Back to Feed'>
                </form>";
            }
            else
            {
                echo
                "<form action='page_friends_view.php'>
                    <input type='submit' value='Back to Friends'>
                </form>";
            }
        ?>

    </body>
</html>