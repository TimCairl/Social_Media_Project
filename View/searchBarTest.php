<form action="../Services/serv_account_search.php">
Search for User by Username: <input type="text" name="username"><br>
<input type="submit" value="Search">

<?php
session_start();
if ($_SESSION['searchResults'] != null)
{
    echo "Session searchResults length: ".count($_SESSION['searchResults']);
    echo "<br>";
    for ($i = 0; $i < count($_SESSION['searchResults']); $i++)
    {
        echo $_SESSION['searchResults'][$i];
    }
}
else
{
    echo "No Users were found";
}
?>

</form>