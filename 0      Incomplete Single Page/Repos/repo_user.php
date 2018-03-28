<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/Social_Media_Project/Repos/repo.php");
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/Social_Media_Project/Models/model_user.php");

class UserRepository extends Repository
{
    function pushUserToDatabase($username, $password, $fname, $lname, $dob)
    {
        $t = "-None-";
        
        $sql = "INSERT INTO users (username, password, firstName, lastName, dateOfBirth, bio, interest, job, employer, isSuspended, isPublic, profilePictureId) 
        VALUES ('$username', '$password', '$fname', '$lname', '$dob', 'This is my page!', '$t', '$t', '$t', '0', '1', '0')";
    
        $this->connection->query($sql);
    }

    function updateUserData($UserModel)
    {
        //$sqlcommand = "UPDATE users SET firstName='$UserModel->userFirstName' WHERE userID=$UserModel->userID";

        // I split them up into different commands because the other one didn't seem to work.
        $this->connection->query("UPDATE users SET firstName='$UserModel->userFirstName' WHERE userID=$UserModel->userID");
        $this->connection->query("UPDATE users SET lastName='$UserModel->userLastName' WHERE userID=$UserModel->userID");
        $this->connection->query("UPDATE users SET dateOfBirth='$UserModel->userDob' WHERE userID=$UserModel->userID");
        $this->connection->query("UPDATE users SET bio='$UserModel->userBio' WHERE userID=$UserModel->userID");
        $this->connection->query("UPDATE users SET interest='$UserModel->userInterest' WHERE userID=$UserModel->userID");
        $this->connection->query("UPDATE users SET job='$UserModel->userJob' WHERE userID=$UserModel->userID");
        $this->connection->query("UPDATE users SET employer='$UserModel->userEmployer' WHERE userID=$UserModel->userID");
        $this->connection->query("UPDATE users SET isPublic='$UserModel->userIsPublic' WHERE userID=$UserModel->userID");
        //$this->connection->query("UPDATE users SET isSuspended='$UserModel->userIsSuspended' WHERE userID=$UserModel->userID"); This one doesn't work
        $this->connection->query("UPDATE users SET profilePictureId='$UserModel->userProfilePictureId' WHERE userID=$UserModel->userID");
    }

    function pullUserFromDatabase($userid)
    {
        //Pulls the specified user from user table in the database and
        //creates and returns a model with associated data
        $UserModel = new UserModel();

        $sqlcommand = "SELECT * FROM users WHERE userId='$userid'";
        $result = $this->connection->query($sqlcommand);

        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            $UserModel->userID = $row['userId'];
            $UserModel->username = $row['username'];
            $UserModel->userPassword = $row['password'];
            $UserModel->userFirstName = $row['firstName'];
            $UserModel->userLastName = $row['lastName'];
            $UserModel->userDob = $row['dateOfBirth'];
            $UserModel->userBio = $row['bio'];
            $UserModel->userInterest = $row['interest'];
            $UserModel->userJob = $row['job'];
            $UserModel->userEmployer = $row['employer'];
            $UserModel->userIsSuspended = $row['isSuspended'];
            $UserModel->userIsPublic = $row['isPublic'];
            $UserModel->userProfilePictureId = $row['profilePictureId'];
            $UserModel->userFriends = $this->fetchFriends($userid);
        }

        return $UserModel;
    }

    function getUserIDWithUsername($username)
    {
        $id = -1;
        $result = $this->connection->query("SELECT userId FROM users WHERE username='$username'");
        if($result->num_rows > 0)
        {
            $id = $result->fetch_assoc()['userId'];
        }
        return $id;
    }

    function fetchFriends($UserID)
    {
        //fetches all of the friends IDs associated with given usermodel->userid
        //Call this method when page showing friends is first loaded in order to display them
        $result = $this->connection->query("SELECT * FROM friends WHERE userId=$UserID");
        $friendIds = array();
        if($result->num_rows > 0)
        {
            for ($i = $result->num_rows; $i > 0; $i--)
            {
                $row = $result->fetch_assoc();
                array_push($friendIds, $row['friendsUserId']);
            }
        }
        return $friendIds;
    }

    function searchUsersByUsername($username)
    {
        //Returns an array of ids associated with similar usernames
        $result = $this->connection->query("SELECT * FROM users WHERE username LIKE '%$username%'");
        //SELECT * FROM `users` WHERE username LIKE '%t%'
        $usersFound = array();
        if($result->num_rows > 0)
        {
            for ($i = $result->num_rows; $i > 0; $i--)
            {
                $row = $result->fetch_assoc();
                array_push($usersFound, $row);
            }
        }
        return $usersFound;
    }

    function searchUsersByName()
    {
        //searches for users in the database table users where their firstname or last name are like the provided text
    }
    
    function changePassword($CurrentUserID, $NewPassword)
    {
        //add verification later

        //Modifies the password of a given user by ID
        $this->connection->query("UPDATE users SET password='$NewPassword' WHERE userId=$CurrentUserID");
    }

    // I made this because the update_user_data wouldn't update the isSuspended field
    function setSuspension($CurrentUserID, $zeroORone)
    {
        if($zeroORone == 0 or $zeroORone == 1)
        {
            $this->connection->query("UPDATE users SET isSuspended='$zeroORone' WHERE userId=$CurrentUserID");
        }
    }

    function addFriend($CurrentUserID, $UserToAddID)
    {
        //Adds a user to the current users friend list
        $this->connection->query("INSERT INTO friends VALUES (".$CurrentUserID.", ".$UserToAddID.")");
    }

    function removeFriend($CurrentUserID, $UserToRemoveID)
    {
        //Removes a user from the current users friend list
        $this->connection->query("DELETE FROM friends WHERE userId=".$CurrentUserID." AND friendsUserId=".$UserToRemoveID);
    }
}
?>