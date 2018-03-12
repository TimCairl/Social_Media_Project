<?php
    session_start();

    require_once("../Repository/UserRepository.php");
    $UserRepo = new UserRepository();

    $UserRepo->setSuspension($_SESSION['userID'], 0);

    header('Location: '.'../View/page_feed.php');
    die();
?>