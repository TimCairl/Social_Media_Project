<?php
    session_start();

    $_SESSION['viewID'] = $_POST['friendID'];
    header('Location: '.'../View/page_profile_view.php');
    die();
?>