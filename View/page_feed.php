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
  $timestamp = time() - 7200; // Current Time - 2 Hours | Will add a setting later
  $PostModelArray = $PostRepository->getFeed($UserModel->userFriends, $timestamp);

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

    <br>
    <?php echo $_SESSION['username'] . "'s Feed" ?> <br>
    <br>

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
            $curUserModel->userFirstName $curUserModel->userLastName ($PostModel->postTimestamp)<br>
            $PostModel->postSubject<br>
            <br>
            $PostModel->postBody <br>
            <br>
        </div>";
      }
    }

    ?>

    <form action="page_profile_view.php">
      <input type="submit" value="My Profile">
    </form>

    <form action="page_friends_view.php">
      <input type="submit" value="Friends">
    </form>

    <form action="page_front.php">
      <input type="submit" value="Log Out">
    </form>
  </body>
</html>