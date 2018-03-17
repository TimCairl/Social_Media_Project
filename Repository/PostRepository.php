<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/Social_Media_Project/Repository/Repository.php");
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/Social_Media_Project/Model/PostModel.php");
class PostRepository extends Repository
{
    function pushPostToDatabase($userID, $subject, $body, $timestamp)
    {
        $sql = "INSERT INTO posts (postID, userID, subject, body, timestamp) 
        VALUES ('$userID', '$subject', '$body', '$timestamp')";
    
        $this->connection->query($sql);
    }

    function pullPostFromDatabase($postID)
    {
        $PostModel = new PostModel();

        $sqlcommand = "SELECT * FROM posts WHERE postID='$postID'";
        $result = $this->connection->query($sqlcommand);

        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            $PostModel->postID = $row['postID'];
            $PostModel->postUserID = $row['userID'];
            $PostModel->postSubject = $row['subject'];
            $PostModel->postBody = $row['body'];
            $PostModel->postTimestamp = $row['timestamp'];
        }

        return $PostModel;
    }

    function getPostsWithUserID($userID, $timestamp)
    {
        //Returns an array of posts after the specified timestamp.   
    }


}
?>