<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>

<body>

<?php

//userId	username	password	firstName	lastName	dateOfBirth	bio	interest	job	employeer	isSuspended	isPublic	profilePicture

//$username = $password = $con_password = $firstname = $lastname = $bday = $privacy = "";
//$userERR = $passERR = $fnameERR = $lnameERR = $bdayERR = "";

function test_data($data) 
{
  /* 
  I might have to change/remove this. It's from here:
  https://www.w3schools.com/php/showphp.asp?filename=demo_form_validation_complete
  */
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function create_account($uname, $pass, $fname, $lname, $dob, $bio, $interest, $job, $employer, $suspended, $public, $pic)
{
  
}


if($_SERVER["REQUEST_METHOD"] == "POST")
{
  //Username
  if(empty($_POST["username"]))
  {
    $userERR = "Enter a Username";
  }
  else
  {
    $username = test_data($_POST["username"]);
  }

  //Password
  if(empty($_POST["password"]))
  {
    $passERR = "Enter a Password";
  }
  else
  {
    $password = test_data($_POST["password"]);
    if(!preg_match("/^[a-zA-Z0-9]*$/", $password))
    {
      $passERR = "Passwords can only contain letters and numbers (maybe change this later)";
    }
    else
    {
      $con_password = test_data($_POST["con_password"]);
    }
  }

}






?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
