<!DOCTYPE html>
<html>
<?php
//-------------------------//
//put controller logic here
require_once("Repository/AppSettingsRepository.php");
require_once("Repository/UserRepository.php");
session_start();


$AppSettingsRepository = new AppSettingsRepository();
$UserRepository = new UserRepository();

$AppSettingsModel = $AppSettingsRepository->pullAllFromDatabase();

//-------------------------//

echo "<title>".$AppSettingsModel->applicationName."</title>";
echo "<body>";



echo "<link rel='icon' href='favicon.ico' type='image/ico' sizes='16x16'>"; //FIX MEEEE




echo "<h1>This is a heading</h1>";
echo "<p>This is a paragraph.</p>";

echo "</body>";

header('Location: '.'View/page_front.php');
die();

?>

<form action="View/page_front.php">
    <input type="submit" value="Front Page">
</form>

</html>