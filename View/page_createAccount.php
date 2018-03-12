<!DOCTYPE html>
<?php
  require_once("../Repository/AppSettingsRepository.php");
  $AppSettingsRepository = new AppSettingsRepository();
  $AppSettingsModel = $AppSettingsRepository->pullAllFromDatabase();

  $username = $firstname = $lastname = $bday = $privacy = "";
  $userERR = $passERR = $nameERR = $bdayERR = "";

  
  function test_data($data) 
  { 
    //I might have to change/remove this. It's from here:
    //https://www.w3schools.com/php/showphp.asp?filename=demo_form_validation_complete
    
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

    function choose_target_page()
  {
    $target = "../Services/create_account.php";
    if(empty($_POST["username"]))
    {
      $target = $_SERVER["PHP_SELF"];
    }
    return $target;
  }
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../CSS/styles.css">
  </head>

  <body class='BG_LGrey'>
    <div class='BG_Blue'><br></div>
    <div class='BG_Orange'><br></div>
    <div class='BG_DGrey title'>
      <br>
      <?php echo $AppSettingsModel->applicationName ?> 
      <br>
      <br>
    </div>
    <div class='BG_Orange'><br></div>

    <div class='createBox'>
      <form action="<?php echo choose_target_page();?>" method="post">
        <fieldset class='TXT_White createTextField'>
          <legend>User Information:</legend>
    
            Username:
            <br>
            <input type="text" name="username" placeholder="Username">
            <br>
            <br>

            Password:
            <br>
            <input type="password" name="password" placeholder="Password"> 
            <br>
            <input type="password" name="con_password" placeholder="Confirm Password">
            <br>
            <br>

            Name:
            <br>
            <input type="text" name="firstname" placeholder="First"> 
            <input type="text" name="lastname" placeholder="Last">
            <br>

            <br>
            Date-of-Birth:
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
      </div>
    <div class='BG_Orange shortline2'><br></div>
  </body>
</html>
