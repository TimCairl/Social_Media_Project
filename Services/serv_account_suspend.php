<?php
    session_start();

    require_once("../Repository/UserRepository.php");
    $UserRepo = new UserRepository();

    $UserRepo->setSuspension($_SESSION['userID'], 1);

    header('Location: '.'../View/page_front.php');
    die();
?>