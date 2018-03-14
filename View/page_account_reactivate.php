<?php
    session_start();
?>

<html>
    <head>
    </head>
    
    <body>
        Reactivate Account?
        <br>
        <br>
        <form action="../Services/serv_account_reactivate.php">
            <input type="submit" value="Reactivate">
        </form>
        <form action="page_front.php">
            <input type="submit" value="Back">
        </form>
    </body>
</html>