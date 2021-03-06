<?php
    session_start();

    require_once("../Repository/UserRepository.php");
    $UserRepo = new UserRepository();
    $UserModel = $UserRepo->pullUserFromDatabase($_SESSION['userID']);

    /*
    picture
    firstName
    lastName
    bday
    interest
    employer
    job
    bio
    privacy
    suspend
    */

    $UserModel->userProfilePictureId = $_POST['picture'];
    $UserModel->userFirstName = $_POST['firstName'];
    $UserModel->userLastName = $_POST['lastName'];
    $UserModel->userDOB = $_POST['bday'];
    $UserModel->userInterest = $_POST['interest'];
    $UserModel->userEmployer = $_POST['employer'];
    $UserModel->userJob = $_POST['job'];
    $UserModel->userBio = $_POST['bio'];
    $UserModel->userIsPublic = $_POST['privacy'];
    //$UserModel->userIsSuspended = $_POST['suspend'];

    $UserRepo->update_user_data($UserModel);
    
    header('Location: '.'../View/page_profile_view.php');
    die();
?>