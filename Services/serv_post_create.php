<?php
    session_start();

    require_once("../Repository/PostRepository.php");
    $PostRepo = new PostRepository();

    $userID = $_SESSION['userID'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    $timestamp = date_format(date_create(null, timezone_open("America/Detroit")), 'Y/m/d H:i:s');
//date_timestamp_get(date_create());//
    $PostRepo->pushPostToDatabase($userID, $subject, $body, $timestamp);

    header('Location: '.'../View/page_profile_view.php');
    die();
?>