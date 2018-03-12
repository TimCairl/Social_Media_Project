<?php
session_start();

/*
This page will:
- Display the relevant feed data
- Navigate to:
--- Account Settings (DAL_getUserSettings)
--- Friend List      (DAL_getFriends)
--- Log Out          (*something*)
*/




echo "<html>
<body>
<br>
";

echo $_SESSION['username'] . "'s Feed";

?>
<br>
<br>
<form action="page_editProfile.php">
  <input type="submit" value="Edit Account">
</form>

<form action="page_friends.php">
  <input type="submit" value="Friends">
</form>

<form action="page_front.php">
  <input type="submit" value="Log Out">
</form>



</body>
</html>