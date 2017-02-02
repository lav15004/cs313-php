<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/cs313-php.css">
</head>
<body>

<?php
include 'dbstuff.inc';


foreach ($db->query('SELECT now()') as $row)
{
 print "<p>$row[0]</p>\n\n";
}

foreach ($db->query('SELECT * from scriptures') as $row)
{
 print "<p><span id='scriptref'>$row[1] $row[2]:$row[3]</span> - \"$row[4]\"</p>\n\n";
}
?>

</body>
</html>