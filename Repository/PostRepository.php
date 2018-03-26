<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/Social_Media_Project/Repository/Repository.php");
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/Social_Media_Project/Model/PostModel.php");
class PostRepository extends Repository
{
    function pushPostToDatabase($userID, $subject, $body, $timestamp)
    {
        $sql = "INSERT INTO posts (userId, subject, body, timestamp)
        VALUES ('$userID', '$subject', '$body', '$timestamp')";
    
        $this->connection->query($sql);
    }

    function pullPostFromDatabase($postID)
    {
        $PostModel = new PostModel();

        $sqlcommand = "SELECT * FROM posts WHERE postId='$postID'";
        $result = $this->connection->query($sqlcommand);

        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            $PostModel->postID = $row['postId'];
            $PostModel->postUserID = $row['userId'];
            $PostModel->postSubject = $row['subject'];
            $PostModel->postBody = $row['body'];
            $PostModel->postTimestamp = $row['timestamp'];
        }

        return $PostModel;
    }

    function getPostsWithUserID($userID, $timestamp)
    {
        //Returns an array of posts after the specified timestamp. [Timestamp check will be added later]   
        $PostModelArray = array();

        $sqlcommand = "SELECT postId FROM posts WHERE userId='$userID'";
        $result = $this->connection->query($sqlcommand);

        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $rows[] = $row;
            }

            foreach($rows as $row)
            {
                array_push($PostModelArray, $this->pullPostFromDatabase($row['postId']));
                //echo $row['postId'];
                //echo "<br>";
            }
        }  

        //$result->free();
        return $PostModelArray;
    }
}
?>