<!DOCTYPE html>
<?php

    echo
    '<div class="createBox">    
        Username:<br>
        <input id="username" type="text" name="username" placeholder="Username"><br>
        <br>

        Password:<br>
        <input id="password" type="password" name="password" placeholder="Password"> <br>
        <input id="password_con" type="password" name="con_password" placeholder="Confirm Password"><br>
        <br>

        Name:<br>
        <input id="firstname" type="text" name="firstname" placeholder="First"> 
        <input id="lastname" type="text" name="lastname" placeholder="Last"><br>
        <br>

        Date-of-Birth:<br>
        <input id="bday" type="date" name="bday" min="1900-01-01"><br>
        <br>
            
        <button type="button" onclick="accCreate_getData()"> Create Account </button><br>
        
        <button type="button" onclick="logIn_getView()"> Back </button><br>
    </div>';

?>