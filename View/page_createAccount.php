<html>
<body>

<?php

$username = $firstname = $lastname = $bday = $privacy = "";
$userERR = $passERR = $nameERR = $bdayERR = "";

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

function choose_target_page()
{
    $target = "../DAL/DAL_createAccount.php";
    if(empty($_POST["username"]))
    {
        $target = $_SERVER["PHP_SELF"];
    }
    return $target;
}


?>

<form action="<?php echo choose_target_page();?>" method="post">
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
      <input type="radio" name="privacy" value="0"> Private<br>
      <input type="radio" name="privacy" value="1" checked> Public<br>  
    </form> 
    
    <br>
    <input type="submit" value="Create Account">
    

  </fieldset>
</form>
</body>
</html>
