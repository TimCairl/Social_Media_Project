<?php
    session_start();

    require_once("../Repository/AppSettingsRepository.php");
    require_once("../Repository/UserRepository.php");
    require_once("../Repository/PictureRepository.php");
    
    $AppSettingsRepository = new AppSettingsRepository();
    $UserRepository = new UserRepository();
    $PictureRepository = new PictureRepository();
    
    $AppSettings = $AppSettingsRepository->pullAllFromDatabase();
    $User = $UserRepository->pullUserFromDatabase($_SESSION['viewID']);
    $Picture = $PictureRepository->pullImageDataFromDatabase($User->userProfilePictureId);
    $space = " ";
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../CSS/styles.css">
    </head>

    <body class='BG_LGrey'>
        <div class='BG_Blue'><br></div>
        <div class='BG_DGrey title'>
            <?php echo $AppSettings->applicationName ?> <br>
        </div>

        <?php
            if($User->userIsPublic == 0 and $_SESSION['viewID'] != $_SESSION['userID'])
            {
                echo "<div class='infoBox'>This profile is private!</div><br>";
                
                echo
                "<form action='page_friends_view.php'>
                    <input type='submit' value='Back to Friends'>
                </form>";
            }
            else
            {
                echo 
                "
                <div class='infoBox'>
                [Profile Picture]<br>
                <img src='$Picture->pictureLink' alt='$Picture->pictureAltText' width='250' height='250'>
                <br>
                [Name]<br>
                <div class='infoField'> $User->userFirstName $space $User->userLastName </div>
                <br>
                [Job]<br>
                <div class='infoField'> $User->userJob $space </div>
                <br>
                [Employer]<br>
                <div class='infoField'> $User->userEmployer </div>
                <br> 
                [Interests]<br>
                <div class='infoField'> $User->userInterest </div>
                <br>
                [Bio]<br>
                <div class='infoField'> $User->userBio </div>
                </div>
                <br>
                ";

                if($_SESSION['viewID'] == $_SESSION['userID'])
                {
                    echo
                    "<form action='page_profile_edit.php'>
                        <input type='submit' value='Edit Account'>
                    </form>
                    
                    <form action='page_profile_posts.php'>
                        <input type='submit' value='Your Posts'>
                    </form>
    
                    <form action='page_feed.php'>
                        <input type='submit' value='Back to Feed'>
                    </form>";
                }
                else
                {
                    echo
                    "<form action='page_profile_posts.php'>
                        <input type='submit' value='$User->userFirstName" . "/s " . "Posts'>
                    </form>

                    <form action='page_friends_view.php'>
                        <input type='submit' value='Back to Friends'>
                    </form>";
                }
            }
        ?>

    </body>
</html>