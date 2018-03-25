<!DOCTYPE html>
<?php
    $_SESSION['viewID'] = $_SESSION['userID'];

    header('Location: '.'../View/page_profile_view.php');
    die();
?>