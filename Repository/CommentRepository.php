<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/Social_Media_Project/Repository/Repository.php");
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/Social_Media_Project/Model/CommentModel.php");
class CommentRepository extends Repository
{
    function pushCommentToDatabase($postID, $userID, $body, $timestamp)
    {
        $sql = "INSERT INTO comments (commentID, postID, userID, body, timestamp) 
        VALUES ('$postID', '$userID', '$body', '$timestamp')";
    
        $this->connection->query($sql);
    }

    function pullCommentFromDatabase($commentID)
    {
        //Returns a single comment

        $CommentModel = new CommentModel();

        $sqlcommand = "SELECT * FROM comments WHERE commentID='$commentID'";
        $result = $this->connection->query($sqlcommand);

        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            $CommentModel->commentID = $row['commentID'];
            $CommentModel->commentPostID = $row['postID'];
            $CommentModel->commentUserID = $row['userID'];
            $CommentModel->commentBody = $row['body'];
            $CommentModel->commentTimestamp = $row['timestamp'];
        }

        return $PostModel;
    }

    function getCommentsWithPostID($postID)
    {
        //Returns an array of comments.
    }
}
?>