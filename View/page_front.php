<html>
<head>

<link rel="stylesheet" type="text/css" href="../CSS/styles.css">
</head>

<?php
require_once("../Repository/AppSettingsRepository.php");
$AppSettingsRepository = new AppSettingsRepository();
$AppSettingsModel = $AppSettingsRepository->pullAllFromDatabase();

echo 
"<body class='blue'>
<div class='white'><br></div>
<div class='greyDark title'>
  <br>"
    .$AppSettingsModel->applicationName." <br>
  <br>
</div>
<div class='white'><br></div>";
?>

<div class="loginBox">
<br>
  <form action="page_logInFailed.php" nonvalidate>
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
<div class='white shortline'><br></div>

</body>
</html>
