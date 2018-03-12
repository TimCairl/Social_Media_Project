<html>
<head>

<link rel="stylesheet" type="text/css" href="../CSS/styles.css">
</head>

<?php
require_once("../Repository/AppSettingsRepository.php");
$AppSettingsRepository = new AppSettingsRepository();
$AppSettingsModel = $AppSettingsRepository->pullAllFromDatabase();

echo 
"<body class='BG_LGrey'>
<div class='BG_Blue'><br></div>
<div class='BG_Orange'><br></div>
<div class='BG_DGrey title'>
  <br>"
    .$AppSettingsModel->applicationName." <br>
  <br>
</div>
<div class='BG_Orange'><br></div>";
?>

<div class="loginBox">
<br>
  <form action="../Services/log_in.php" nonvalidate method='post'>
    <fieldset>
      <input type="text" name="username" placeholder="Username" autofocus>
      <br>
      <input type="password" name="password" placeholder="Password">
      <br><br>
      <input type="submit" value="Log In">
    </fieldset>
  </form>
<br>
<form action="page_createAccount.php">
  <input type="submit" value="Create Account">
</form>
<br>
</div>
<div class='BG_Orange shortline'><br></div>

</body>
</html>
