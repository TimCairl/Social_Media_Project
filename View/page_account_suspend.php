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
        <form action="../Services/serv_account_suspend.php">
            <input type="submit" value="Suspend">
        </form>
        <form action="page_profile_edit.php">
            <input type="submit" value="Back">
        </form>
    </body>
</html>