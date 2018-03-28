<!DOCTYPE html>
<?php
  session_start();

  $_SESSION['viewID'] = $_SESSION['userID'];

  require_once("../Repository/AppSettingsRepository.php");
  require_once("../Repository/UserRepository.php");
  require_once("../Repository/PostRepository.php");
  require_once("../Repository/CommentRepository.php");

  $AppSettingsRepository = new AppSettingsRepository();
  $UserRepository = new UserRepository();
  $PostRepository = new PostRepository();
  $CommentRepository = new CommentRepository();

  $AppSettings = $AppSettingsRepository->pullAllFromDatabase();
  $UserModel = $UserRepository->pullUserFromDatabase($_SESSION['userID']);

  $ViewMyPosts = true;
  if($ViewMyPosts)
  {
    array_push($UserModel->userFriends, $_SESSION['userID']);
  }

  // time() produces a timestamp
  // use strtotime($date) to convert a date from the table to a timestamp
  // date('Y/m/d H:i:s', $timestamp) to get a properly formatted date
  // subtract a number of seconds from time()
  //$timestamp = time() - 7200; // Current Time - 2 Hours | Will add a setting later

  $timestamp = date('Y/m/d H:i:s', (time() - 7200));
  $PostModelArray = $PostRepository->getFeed($UserModel->userFriends, $timestamp);

  //'<a href="../Services/serv_friend_goTo.php?friendID='.$Temp->userID.'">'.$Temp->username.'</a>';

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

    <div class='profilePosts'>
    <?php
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
            $PostModel->postSubject ($PostModel->postTimestamp)<br>
            <br>
            $PostModel->postBody <br>
            <br>
          </div>";
        }
      }
    ?>
    </div>
  </body>
</html>