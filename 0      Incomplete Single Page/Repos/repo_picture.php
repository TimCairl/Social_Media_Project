<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/Social_Media_Project/Repos/repo.php");
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/Social_Media_Project/Models/model_picture.php");

class PictureRepository extends Repository
{
    function pullImageDataFromDatabase($pictureId)
    {
        //Returns a PictureModel populated with data from picture table within the database
        $pictureModel = new PictureModel();
        $result = $this->connection->query("SELECT * FROM pictures WHERE pictureId='$pictureId'");
        if ($result->num_rows > 0)
        {
            $imageData = $result->fetch_assoc();
            $pictureModel->pictureId = $imageData['pictureId'];
            $pictureModel->pictureLink = $imageData['pictureLink'];
            $pictureModel->pictureAltText = $imageData['pictureAltText'];
        }
        else
        {
            $pictureModel->pictureId = "Failed to Retrieve data to create a Model";
            $pictureModel->pictureLink = "Failed to Retrieve data to create a Model";
            $pictureModel->pictureAltText = "Failed to Retrieve data to create a Model";
        }
        return $pictureModel;
    }

    function pullImageLinkFromDatabase($pictureId)
    {
        $result = $this->connection->query("SELECT pictureLink FROM pictures WHERE pictureId='$pictureId'");
        if ($result->num_rows > 0)
        {
            $imageLink = $result->fetch_assoc()['pictureLink'];
        }
        else
        {
            $imageLink = "No pictureLink associated with pictureId: ".$pictureId.".";
        }
        return $imageLink;
    }

    function pullImageAltTextFromDatabase($pictureId)
    {
        $result = $this->connection->query("SELECT pictureAltText FROM pictures WHERE pictureId='$pictureId'");
        if ($result->num_rows > 0)
        {
            $imageAltText = $result->fetch_assoc()['pictureAltText'];
        }
        else
        {
            $imageAltText = "No pictureAltText associated with pictureId: ".$pictureId.".";
        }
        return $imageAltText;
    }
}
?>
