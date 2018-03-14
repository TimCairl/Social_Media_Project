<?php
  session_start();

  require_once("../Repository/AppSettingsRepository.php");
  $AppSettingsRepository = new AppSettingsRepository();
  $AppSettingsModel = $AppSettingsRepository->pullAllFromDatabase();

/*
This page will:
- Display the relevant feed data
- Navigate to:
--- Account Settings (DAL_getUserSettings)
--- Friend List      (DAL_getFriends)
--- Log Out          (*something*)
*/

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

    <form action="page_profile.php">
      <input type="submit" value="My Profile">
    </form>

    <form action="page_friends.php">
      <input type="submit" value="Friends">
    </form>

    <form action="page_front.php">
      <input type="submit" value="Log Out">
    </form>
  </body>
</html>