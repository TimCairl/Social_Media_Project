<?php
require_once("Repository.php");
class AppSettingsRepository extends Repository
{
    function pullAppNameFromDatabase()
    {
        $sql = "SELECT setting_value FROM applicationsettings WHERE setting_key='ApplicationName'";
        
        $res = $this->connection->query($sql);
        if($res->num_rows > 0)
        {
            $row = $res->fetch_assoc();
            $appName = $row['setting_value'];
            return $appName;
        }
        else
        {
            return "";
        }
        
    }
}
?>