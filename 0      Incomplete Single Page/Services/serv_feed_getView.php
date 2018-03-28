<?php
    require_once("../Repos/repo_user.php");
    require_once("../Repos/repo_post.php");
    //require_once("../Repos/repo_comment.php");

    $UserRepository = new UserRepository();
    $PostRepository = new PostRepository();
    //$CommentRepository = new CommentRepository();

    echo '<div onload="navBar_display()"></div>';

?>