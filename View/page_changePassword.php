<?php
    session_start();
?>

<html>
    <body class='BG_LGrey'>
        <form action='../Services/change_password.php' method='post'>
            <fieldset>
                | <input type='password' name='password_old' size='25'> | Old Password 
                <br>
                | <input type='password' name='password_new' size='25'> | New Password
                <br>
                | <input type='password' name='password_con' size='25'> | Confirm Password 
                <br>
            </fieldset>
            <input type="submit" value="Change Password">
        </form>
        <br>
        <form action="page_editProfile.php">
            <input type="submit" value="Back">
        </form>
    </body>
</html>