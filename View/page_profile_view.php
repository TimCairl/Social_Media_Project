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
    $PostModelArray = $PostRepository->getPostsWithUserID($_SESSION['viewID'], null);
    $space = " ";
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
                <div class='profileInfo'>
                [Profile Picture]<br>
                <br>
                [Name]<br>
                <div class='infoField'> $UserModel->userFirstName $space $UserModel->userLastName </div>
                <br>
                [Job]<br>
                <div class='infoField'> $UserModel->userJob $space </div>
                <br>
                [Employer]<br>
                <div class='infoField'> $UserModel->userEmployer </div>
                <br> 
                [Interests]<br>
                <div class='infoField'> $UserModel->userInterest </div>
                <br>
                [Bio]<br>
                <div class='infoField'> $UserModel->userBio </div>";

                // Echo navigation buttons and close the info division
                if($_SESSION['viewID'] == $_SESSION['userID'])
                {
                    echo
                    "<form action='page_profile_edit.php'>
                        <input type='submit' value='Edit Account'>
                    </form>
    
                    <form action='page_feed.php'>
                        <input type='submit' value='Back to Feed'>
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
                    "<form action='../Services/serv_post_create.php' method='post'>
                        <input type='text' name='subject' placeholder='Subject'>
                        <input type='text' name='body' placeholder='Body'>
                        <input type='submit' value='Make Post'>
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
                            $curUserModel->userFirstName $curUserModel->userLastName ($PostModel->postTimestamp)<br>
                            $PostModel->postSubject<br>
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