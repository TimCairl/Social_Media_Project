<?php
    session_start();

    require_once("../Repository/AppSettingsRepository.php");
    require_once("../Repository/UserRepository.php");
    require_once("../Repository/PostRepository.php");
    require_once("../Repository/CommentRepository.php");

    $UserRepo = new UserRepository();
    $PostRepo = new PostRepository();
    $CommentRepo = new CommentRepository();

    $PostModelArray = $PostRepo->getPostsWithUserID($_SESSION['viewID'], null);
    $space = " ";
    
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../CSS/styles.css">
    </head>

    <body>
        <?php
            if($_SESSION['viewID'] == $_SESSION['userID'])
            {
                echo
                "<form action='../Services/serv_post_create.php' method='post'>
                    <input type='text' name='subject' placeholder='Subject'>
                    <input type='text' name='body' placeholder='Body'>
                    <input type='submit' value='Make Post'>
                </form>";
            }

            if(sizeof($PostModelArray) > 0)
            {
                $curID = -1;
                $curUserModel = -1;
                foreach($PostModelArray as $PostModel)
                {
                    if($PostModel->postUserID != $curID)
                    {
                        $curID = $PostModel->postUserID;
                        $curUserModel = $UserRepo->pullUserFromDatabase($curID);
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

            echo
            "<form action='page_profile_view.php'>
                <input type='submit' value='Back to Profile'>
            </form>";
        ?>
    </body>
</html>