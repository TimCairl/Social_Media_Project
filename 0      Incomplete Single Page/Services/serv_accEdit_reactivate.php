<!DOCTYPE html>
<?php
    require_once("../Repos/repo_user.php");
    $UserRepository = new UserRepository();

    $UserRepository->setSuspension($_POST['userID'], 0);

    header('Location: '.' serv_feed_getView.php');
?>