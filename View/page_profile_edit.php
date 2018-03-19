<?php
    session_start();

    require_once("../Repository/AppSettingsRepository.php");
    $AppSettingsRepository = new AppSettingsRepository();
    $AppSettingsModel = $AppSettingsRepository->pullAllFromDatabase();

    require_once("../Repository/UserRepository.php");
    $UserRepo = new UserRepository();
    $UserModel = $UserRepo->pullUserFromDatabase($_SESSION['userID']);
?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="../CSS/styles.css">
</head>

<body class='BG_LGrey'>
    <div class='BG_Blue'> <br> </div>
    <div class='BG_DGrey title'>
        <?php echo $AppSettingsModel->applicationName ?> <br>
    </div>

    <div class='createBox'>
        <form action="../Services/serv_account_changeProfile.php" method="post">
            <fieldset class='TXT_White createTextField'>
                Profile Picture:
                <br>
                <input name='picture' size='55' value='<?php echo $UserModel->userProfilePicture?>'>
                </input>
                <br>
                <br>
            
                Name:
                <br>
                <input type='text' name='firstName' placeholder='First' value='<?php echo $UserModel->userFirstName?>'>
                <input type='text' name='lastName' placeholder='Last' value='<?php echo $UserModel->userLastName?>'>
                <br>
                <br>

                Date-of-Birth:
                <br>
                <input type='date' name='bday' min='1900-01-01' value='<?php echo $UserModel->userDOB?>'>
                <br>
                <br>

                Interests:
                <br>
                <input name='interest' size='55' value='<?php echo $UserModel->userInterest?>'>
                </input>
                <br>
                <br>

                Employer:
                <br>
                <input name='employer' size='55' value='<?php echo $UserModel->userEmployer?>'>
                </input>
                <br>
                <br>

                Job:
                <br>
                <input name='job' size='55' value='<?php echo $UserModel->userJob?>'>
                </input>
                <br>
                <br>

                Bio:
                <br>
                <input name='bio' size='55' value='<?php echo $UserModel->userBio?>'>
                </input>
                <br>
                <br>

                Privacy:
                <br>
                <form>
                    <input type='radio' name='privacy' value='0' <?php if($UserModel->userIsPublic == 0){echo "checked";}?>> Private<br>
                    <input type='radio' name='privacy' value='1' <?php if($UserModel->userIsPublic == 1){echo "checked";}?>> Public<br>  
                </form> 
                <br>

                <?php
                /*
                Move this to a different page

                Suspend Account:
                <br>
                <form>
                    <input type='radio' name='suspend' value='0' checked> No <br>
                    <input type='radio' name='suspend' value='1'> Yes <br>
                </form>
                <br>
                */
                ?>

                <input type="submit" value="Save">

            </fieldset>
        </form>

        <form action="page_account_changePassword.php">
            <input type="submit" value="Change Password">
        </form>

        <form action="page_account_suspend.php">
            <input type="submit" value="Suspend Account">
        </form>

        <form action="page_profile_view.php">
            <input type="submit" value="Back">
        </form>
    </div>

</body>

</html>