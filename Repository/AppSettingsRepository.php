<?php
class ApplicationSettingsRepository extends Repository
{
    function pullApplicationNameFromDatabase()
    {
        $sql = "SELECT setting_value FROM 'applicationsettings' WHERE setting_key='ApplicationName'";
        $applicationName = $connection->query($sql);
        return $applicationName;
    }
}
?>