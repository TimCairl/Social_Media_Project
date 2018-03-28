<!DOCTYPE html>
<?php
    echo
    '<div class="logInBox"><br>
        <div class="logInError">
            Your Username or Password was incorrect.
        </div><br>
        
        <input id="username" type="text" name="username" placeholder="Username" autofocus><br>
        <input id="password" type="password" name="password" placeholder="Password"><br>
        <br>
        <button type="button" onclick="logIn_getData()"> Log In </button><br>
        <br>
        <button type="button" onclick="accCreate_getView()"> Create Account </button><br>
        <br>
    </div>';
?>