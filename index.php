<!DOCTYPE html>
<html>
<?php
//-------------------------//
//put controller logic here
include_once("Repository/AppSettingsRepository.php");
$AppSettingsRepository = new AppSettingsRepository();






//-------------------------//

$AppName = $AppSettingsRepository->pullAppNameFromDatabase();
echo $AppName;
echo "<title>".$AppName."</title>";
echo "<body>

<h1>This is a heading</h1>
<p>This is a paragraph.</p>

</body>";
?>

<form action="View/page_front.php">
    <input type="submit" value="Front Page">
</form>

</html>