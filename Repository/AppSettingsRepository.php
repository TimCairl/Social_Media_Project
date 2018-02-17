<?php
include_once("Repository.php");
class AppSettingsRepository extends Repository
{
    function pullAppNameFromDatabase()
    {
        $sql = "SELECT setting_value FROM 'applicationsettings' WHERE setting_key='ApplicationName'";
        $appName = $this->connection->query($sql);
        echo $appName;
        return $appName;
    }
}
?>