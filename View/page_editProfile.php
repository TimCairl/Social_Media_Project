<?php

/*
This page will:
- Display the current user settings
- [SAVE]: Pass current/new settings to DAL_setUserSettings
- [Back]: Go to page_userFeed

*/


?>



<html>
<body>

<p>*UserID Username Password, FirstName, LastName, DOB, Bio, Interest, *Job, *Employer, isSuspended, isPublic, ProfilePicture </p>

<br>

<form action="page_userFeed.php">
    <input type="submit" value="Back">
</form>
    
<form action="page_editAccount.php">
    <input type="submit" value="Save">
</form>


</body>
</html>