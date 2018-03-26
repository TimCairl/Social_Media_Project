<!DOCTYPE html>
<?php
    session_start();

    require_once("../Repository/AppSettingsRepository.php");
    require_once("../Repository/UserRepository.php");
    require_once("../Repository/PostRepository.php");
    require_once("../Repository/CommentRepository.php");
    
    $AppSettingsRepository = new AppSettingsRepository();
    $UserRepository = new UserRepository();
    $PostRepository = new PostRepository();
    $CommentRepository = new CommentRepository();
    
    $AppSettingsModel = $AppSettingsRepository->pullAllFromDatabase();
    $UserModel = $UserRepository->pullUserFromDatabase($_SESSION['viewID']);

    // time() produces a timestamp
    // use strtotime($date) to convert a date from the table to a timestamp
    // date('Y/m/d H:i:s', $timestamp) to get a properly formatted date
    // subtract a number of seconds from time()

    $PostModelArray = $PostRepository->getPostsWithUserID($_SESSION['viewID'], null);
    $space = " ";
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../CSS/styles.css">
    </head>

    <body class='BG_LGrey'>
        <div class='BG_DGrey title'>
            <?php echo $AppSettings->applicationName ?> <br>
        </div>

        <div class='navBar'>
            <a href="../Services/serv_account_goTo.php">Profile</a>
            <a href="page_friends_view.php">Friends</a>
            <a href="page_feed.php">Feed</a>
            <a href="page_front.php" style="float:right">Log Out</a>
        </div>
        <div class='titleBottom'></div>

        <?php
            // Echo info division
            if($UserModel->userIsPublic == 0 and $_SESSION['viewID'] != $_SESSION['userID'])
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
                [Profile Picture Goes Here]<br>
                <br>

                <div class='infoTitle'>Name:
                <div class='infoField'> $UserModel->userFirstName $space $UserModel->userLastName </div>
                </div><br>

                <div class='infoTitle'>Job:
                <div class='infoField'> $UserModel->userJob $space </div>
                </div><br>

                <div class='infoTitle'>Employer:<br>
                <div class='infoField'> $UserModel->userEmployer </div>
                </div><br>

                <div class='infoTitle'>Interests:<br>
                <div class='infoField'> $UserModel->userInterest </div>
                </div><br>

                <div class='infoTitle'>Bio:<br>
                <div class='infoField'> $UserModel->userBio </div>
                </div><br>";

                // Echo navigation buttons and close the info division
                if($_SESSION['viewID'] == $_SESSION['userID'])
                {
                    echo
                    "<form action='page_profile_edit.php'>
                        <input type='submit' value='Edit Account'>
                    </form>
                    </div>";
                }
                else
                {
                    echo
                    "<form action='page_friends_view.php'>
                        <input type='submit' value='Back to Friends'>
                    </form>
                    </div>";
                }

                //Echo Posts
                echo "<div class='profilePosts'>";
                
                if($_SESSION['viewID'] == $_SESSION['userID'])
                {
                    echo
                    "<form class='postBar' action='../Services/serv_post_create.php' method='post'>
                        <input type='text' name='subject' placeholder='Subject'>
                        <input type='text' name='body' placeholder='Body'>
                        <input type='submit' value='Make Post'>
                    <br><br>
                    </form>";
                }
    
                $size = sizeof($PostModelArray);
                if($size > 0)
                {
                    $curID = -1;
                    $curUserModel = -1;
                    //foreach($PostModelArray as $PostModel)
                    for($i = ($size - 1); $i > -1; $i--)
                    {
                        $PostModel = $PostModelArray[$i];
                        if($PostModel->postUserID != $curID)
                        {
                            $curID = $PostModel->postUserID;
                            $curUserModel = $UserRepository->pullUserFromDatabase($curID);
                        }
    
                        echo
                        "<div class='postBox'>
                            $curUserModel->userFirstName $curUserModel->userLastName<br>
                            $PostModel->postSubject  ($PostModel->postTimestamp)<br>
                            <br>
                            $PostModel->postBody <br>
                            <br>
                        </div>";
                    }
                }

                echo "</div>";

            }
        ?>

    </body>
</html>