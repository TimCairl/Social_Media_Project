<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/Social_Media_Project/Repository/Repository.php");
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/Social_Media_Project/Model/UserModel.php");
class UserRepository extends Repository
{
    function pushToDatabase()
    {
        //Template of this function that can be used for classes inheriting from this class.
        //$sql = "insert into users (username, password, firstName, lastName) values('test123', 'password123', 'Joe', 'Schmoe')";
        //$connection->query($sql);
    }

    function update_user_data($UserModel)
    {
        //Could probably cut out first name, last name, and date of birth

        /*
        $sqlcommand = "UPDATE users SET
         firstName='$UserModel->userFirstName',
         lastName='$UserModel->userLastName',
         dateOfBirth='$UserModel->userDOB',
         bio='$UserModel->userBio',
         interest='$UserModel->userInterest',
         job='$UserModel->userJob',
         employeer='$UserModel->userEmployer',
         isSuspended='$UserModel->userIsSuspended',
         isPublic='$UserModel->userIsPublic',
         profilePicture='$userProfilePicture',
         WHERE userId = $UserModel->userID";
        */

        //$sqlcommand = "UPDATE users SET firstName='$UserModel->userFirstName' WHERE userID=$UserModel->userID";

        // I split them up into different commands because the other one didn't seem to work.
        $this->connection->query("UPDATE users SET firstName='$UserModel->userFirstName' WHERE userID=$UserModel->userID");
        $this->connection->query("UPDATE users SET lastName='$UserModel->userLastName' WHERE userID=$UserModel->userID");
        $this->connection->query("UPDATE users SET dateOfBirth='$UserModel->userDOB' WHERE userID=$UserModel->userID");
        $this->connection->query("UPDATE users SET bio='$UserModel->userBio' WHERE userID=$UserModel->userID");
        $this->connection->query("UPDATE users SET interest='$UserModel->userInterest' WHERE userID=$UserModel->userID");
        $this->connection->query("UPDATE users SET job='$UserModel->userJob' WHERE userID=$UserModel->userID");
        $this->connection->query("UPDATE users SET employeer='$UserModel->userEmployer' WHERE userID=$UserModel->userID");
        $this->connection->query("UPDATE users SET isPublic='$UserModel->userIsPublic' WHERE userID=$UserModel->userID");
        $this->connection->query("UPDATE users SET isSuspended='$UserModel->userIsSuspended' WHERE userID=$UserModel->userID");
        $this->connection->query("UPDATE users SET profilePicture='$UserModel->userProfilePicture' WHERE userID=$UserModel->userID");
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
            $UserModel->userDOB = $row['dateOfBirth'];
            $UserModel->userBio = $row['bio'];
            $UserModel->userInterest = $row['interest'];
            $UserModel->userJob = $row['job'];
            $UserModel->userEmployer = $row['employer'];
            $UserModel->userIsSuspended = $row['isSuspended'];
            $UserModel->userIsPublic = $row['isPublic'];
            $UserModel->userProfilePicture = $row['profilePicture'];
        }

        return $UserModel;
    }

    // Also used to check if a username is in the database already.
    function get_ID_with_Username($username)
    {
        $id = -1;
        $result = $this->connection->query("SELECT userId FROM users WHERE username='$username'");
        if($result->num_rows > 0)
        {
            $id = $result->fetch_assoc()['userId'];
        }
        return $id;
    }

    function pullAllFromDatabase()//this would pull literally every single user from the database
    {
//        //Pulls all the data from applicationsettings database and
//        //creates and returns a model with associated data from database
//        $UserModel = new UserModel();
//
//        //FIX ME TO SUPPORT MULTIPLE SETTING VALUES AND KEYS
//        $sqlcommand = "SELECT setting_value FROM applicationsettings WHERE setting_key='ApplicationName'";
//        //do some research on sql commands and how they work ^^^^^^
//
//        $result = $this->connection->query($sqlcommand);
//        if($result->num_rows > 0)
//        {
//            $row = $result->fetch_assoc();
//            $appName = $row['setting_value'];
//        }
//        $UserModel->applicationName = $appName;
//        //FIX ME TO SUPPORT MULTIPLE SETTING VALUES AND KEYS
//
//        return $UserModel;
    }
}
?>