<!DOCTYPE html>
<?php
  require_once("../Repository/AppSettingsRepository.php");
  $AppSettingsRepository = new AppSettingsRepository();
  $AppSettingsModel = $AppSettingsRepository->pullAllFromDatabase();
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../CSS/styles.css">
  </head>
 
  <body class='BG_LGrey'>
    <div class='BG_DGrey title'>
      <?php echo $AppSettingsModel->applicationName ?><br>
    </div>

    <div class="loginBox"><br>
      <form action="../Services/serv_account_logIn.php" nonvalidate method='post'>
        <fieldset>
          <input type="text" name="username" placeholder="Username" autofocus><br>
          <input type="password" name="password" placeholder="Password"><br>
          <br>
          <input type="submit" value="Log In">
        </fieldset>
      </form><br>

      <form action="page_account_create.php">
        <input type="submit" value="Create Account">
      </form><br>
    </div>
  </body>
</html>
