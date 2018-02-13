<!DOCTYPE html>
<html>
<body>

<form action="page_userFeed.php">
  <fieldset>
    <legend>User Information:</legend>
    
    Username:
    <br>
    <input type="text" name="username" placeholder="Username">
    <br>
    <br>
    Password:
    <br>
    <input type="password" name="password" placeholder="Password"> <br>
    <input type="password" name="con_password" placeholder="Confirm Password">
    <br>
    <br>


    Name:
    <br>
    <input type="text" name="firstname" placeholder="First Name"> <input type="text" name="lastname" placeholder="Last Name">
    <br>

    <br>
    Date of Birth:
    <br>
    <input type="date" name="bday" min="1900-01-01">
    <br>

    <br>
    Privacy Setting:
    <br>
    <form>
      <input type="radio" name="privacy" value="Private"> Private<br>
      <input type="radio" name="privacy" value="Public" checked> Public<br>  
    </form> 
    
    <br>
    <input type="submit" value="Create Account">
    

  </fieldset>
</form>

</body>
</html>
