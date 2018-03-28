<!DOCTYPE html>
<?php
    session_start();

    $userID = $_SESSION['userID'];

    echo
    '<div class="logInBox" style="color: #E5DCC5;">
        <br>
        Reactivate Account?<br>
        <br>
        <button type="button" onclick="accEdit_reactivate('.$userID.')"> Yes </button>
        <button type="button" onclick="logIn_getView()"> No  </button><br>
        <br>
    </div>'
?>