<!DOCTYPE html>
<html>
<body>

<p>UserID Username Password, FirstName, LastName, DOB, Bio, Interest, Job, Employer, isSuspended, isPublic, ProfilePicture </p>

<form action="page_createAccount.php">
  <fieldset>
    <legend>User Information:</legend>
    
    Username:
    <input type="text" name="username" placeholder="Username">
    <br>
    
    Password:
    <input type="password" name="password" placeholder="Password">
    <br>

    Confirm Password:
    <input type="password" name="con_password" placeholder="Confirm Password">
    <br>


    Name:
    <input type="text" name="firstname" placeholder="First Name"> <input type="text" name="lastname" placeholder="Last Name">

    <br>
    Date of Birth:

    <br>
    Interest:

    <br>
    Job:

    <br>
    Employer:

    <br>
    Privacy:
    <br>
    <form>
      <input type="radio" name="privacy" value="Private"> Private<br>
      <input type="radio" name="privacy" value="Public" checked> Public<br>  
    </form> 
    
    <br>
    <input type="submit" value="Submit">

  </fieldset>
</form>

</body>
</html>
