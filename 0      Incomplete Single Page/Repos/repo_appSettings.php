<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/Social_Media_Project/Repos/repo.php");
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/Social_Media_Project/Models/model_appSettings.php");

class AppSettingsRepository extends Repository
{
    function pullSettingFromDatabase($settingKey)
    {
        $ApplicationSettingsModel = new ApplicationSettingsModel();

        $sqlcommand = "SELECT settingValue FROM application_settings WHERE settingKey='$settingKey'";
        $result = $this->connection->query($sqlcommand);
        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            $ApplicationSettingsModel->settingKey = $settingKey;
            $ApplicationSettingsModel->settingValue = $row['settingValue'];
        }

        return $ApplicationSettingsModel;
    }
}
?>