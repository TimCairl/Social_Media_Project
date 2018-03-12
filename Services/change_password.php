<?php
    session_start();

    require_once("../Repository/UserRepository.php");
    $UserRepo = new UserRepository();
    $UserModel = $UserRepo->pullUserFromDatabase($_SESSION['userID']);

    // Input from page_changePassword.php :
    // $_POST['password_old' | 'password_new' | 'password_con']

    $old_pass = $_POST['password_old'];
    $new_pass = $_POST['password_new'];
    $con_pass = $_POST['password_con'];

    if($old_pass == $UserModel->userPassword)
    {
        if($new_pass == $con_pass)
        {
            $UserRepo->changePassword($_SESSION['userID'], $con_pass);
            header('Location: '.'../View/page_editProfile.php');
            die();
        }
    }
    header('Location: '.'../View/page_changePassword.php');
    die();


/*
    if (true)//add check to see if it can be changed
{
    //changes password
    $UserRepository->changePassword(1, $_GET['newPassword']);//magic number one for example
}
else
{
    //password is same as before
}
*/
?>