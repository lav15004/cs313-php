<!DOCTYPE html>
<html lang="en">
<head>
    <title>Scripture Resources</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/cs313-php.css">
</head>
<body>
<h1>Scripture Resources - Search Results</h1>
<br />
<?php
include 'dbstuff.inc';



foreach ($db->query('SELECT * from scriptures where id='.$_GET["id"]) as $row)
{
    print "<p><span id='scriptref'>$row[1] $row[2]:$row[3]</span> - \"$row[4]\"</p>\n\n";
}
?>

</body>
</html>