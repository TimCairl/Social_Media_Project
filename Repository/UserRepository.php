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

    function pullUserFromDatabase($userid)
    {
        //Pulls the specified user from user table in the database and
        //creates and returns a model with associated data
        $UserModel = new UserModel();

        $sqlcommand = "SELECT  FROM applicationsettings WHERE setting_key='ApplicationName'";

        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            $appName = $row[''];
        }

        $UserModel->;

        return $UserModel;
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