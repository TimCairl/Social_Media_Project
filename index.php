<!DOCTYPE html>
<html>
<?php
//-------------------------//
//put controller logic here
require_once("Repository/AppSettingsRepository.php");
$AppSettingsRepository = new AppSettingsRepository();





//-------------------------//

$AppName = $AppSettingsRepository->pullAppNameFromDatabase();
echo "<title>".$AppName."</title>";
echo "<body>";



echo "<link rel='icon' href='favicon.ico' type='image/ico' sizes='16x16'>"; //FIX MEEEE




echo "<h1>This is a heading</h1>";
echo "<p>This is a paragraph.</p>";

echo "</body>";
?>

<form action="View/page_front.php">
    <input type="submit" value="Front Page">
</form>

</html>