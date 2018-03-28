<?php
    session_start();

    require_once("../Repos/repo_user.php");
    $UserRepository = new UserRepository();

    $id = $UserRepository->getUserIDWithUsername($_POST['username']);
    if($id == -1)
    {
        // Show LogIn Error
        header('Location: '.' serv_logIn_getError.php');
        die();
    }
        
    $UserModel = $UserRepository->pullUserFromDatabase($id);
    if($_POST["password"] != $UserModel->userPassword)
    {
        // Show LogIn Error
        header('Location: '.' serv_logIn_getError.php');
        die();
    }

    $_SESSION['userID'] = $id;
    if($UserModel->userIsSuspended == '1')
    {
        // Get suspended view
        header('Location: '.' serv_accEdit_getViewReactivate.php');
        die();
    }

    header('Location: '.' serv_feed_getView.php');
?>