<?php
    session_start();
?>

<html>
    <head>
    </head>
    
    <body>
        Suspend Account?
        <br>
        <br>
        <form action="../Services/suspend_account.php">
            <input type="submit" value="Suspend">
        </form>
        <form action="page_editProfile.php">
            <input type="submit" value="Back">
        </form>
    </body>
</html>