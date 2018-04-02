<!DOCTYPE html>
<?php
    session_start();

    $_SESSION['viewID'] = $_SESSION['userID'];

    header('Location: '.'../View/page_profile_view.php');
    die();
?>