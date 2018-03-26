<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/Social_Media_Project/Repository/Repository.php");
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/Social_Media_Project/Model/ApplicationSettingsModel.php");
class AppSettingsRepository extends Repository
{
    function pullAllFromDatabase()
    {
        //Pulls all the data from applicationsettings database and
        //creates and returns a model with associated data from database
        $ApplicationSettingsModel = new ApplicationSettingsModel();



        
        //FIX ME TO SUPPORT MULTIPLE SETTING VALUES AND KEYS
        $sqlcommand = "SELECT settingValue FROM application_settings WHERE settingKey='applicationName'";
        //do some research on sql commands and how they work ^^^^^^
        
        $result = $this->connection->query($sqlcommand);
        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            $appName = $row['settingValue'];
        }
        $ApplicationSettingsModel->applicationName = $appName;
        //FIX ME TO SUPPORT MULTIPLE SETTING VALUES AND KEYS



        return $ApplicationSettingsModel;
    }
}
?>