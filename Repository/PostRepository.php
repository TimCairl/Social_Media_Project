<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/Social_Media_Project/Repository/Repository.php");
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/Social_Media_Project/Model/PostModel.php");

function sortPostsByTimestamp($PostModelA, $PostModelB)
{
    return strtotime($PostModelA->postTimestamp) - strtotime($PostModelB->postTimestamp);
}

class PostRepository extends Repository
{
    function pushPostToDatabase($userID, $subject, $body, $timestamp)
    {
        $sql = "INSERT INTO posts (userID, subject, body, timestamp)
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

    /**
     * Returns an array of posts after the specified timestamp. 
     */
    function getPostsWithUserID($userID, $timestamp)
    {
        $PostModelArray = array();

        $sqlcommand = "SELECT postID FROM posts WHERE userID='$userID'";
        $result = $this->connection->query($sqlcommand);

        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $rows[] = $row;
            }

            foreach($rows as $row)
            {
                $PostModel =  $this->pullPostFromDatabase($row['postID']);
                if($timestamp == null)
                    array_push($PostModelArray, $PostModel);
                else
                {
                    $PostDate = strtotime($PostModel->postTimestamp);
                    if($PostDate > $timestamp)
                    {
                        array_push($PostModelArray, $PostModel);
                    }
                }
                //echo $row['postID'];
                //echo "<br>";
            }
        }  

        //$result->free();
        return $PostModelArray;
    }

    function getFeed($friendIDArray, $timestamp)
    {
        $PostModelMasterArray = array();
        foreach($friendIDArray as $friendID)
        {
            $PostModelArray = $this->getPostsWithUserID($friendID, $timestamp);
            if(sizeof($PostModelArray) > 0)
            {
                foreach($PostModelArray as $PostModel)
                {
                    array_push($PostModelMasterArray, $PostModel);
                }
            }
        }

        usort($PostModelMasterArray, "sortPostsByTimestamp");

        return $PostModelMasterArray;
    }
}
?>