//This is going to be the first file displayed and executed
<!DOCTYPE html>
<html>

//-------------------------//
//put controller logic here
<?php
$AppSettingsRepository = new AppSettingsRepository();






//-------------------------//

$ApplicationName = $AppSettingsRepository->pullApplicationNameFromDatabase();
<title>$ApplicationName</title>
<body>

<h1>This is a heading</h1>
<p>This is a paragraph.</p>

</body>
?>
</html>