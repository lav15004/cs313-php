<html>
<body>

<?php

// default Heroku Postgres configuration URL
$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
 // example localhost configuration URL with postgres username and a database called cs313db
 $dbUrl = "postgres://postgres:password@localhost:5432/cs313db";
}

$dbopts = parse_url($dbUrl);

print "<p>$dbUrl</p>\n\n";

$dbHost = $dbopts["host"];
echo "$dbHost<br />";
$dbPort = $dbopts["port"];
echo "$dbPort<br />";
$dbUser = $dbopts["user"];
echo "$dbUser<br />";
$dbPassword = $dbopts["pass"];
echo "$dbPassword<br />";
$dbName = ltrim($dbopts["path"],'/');
echo "$dbName<br />";

print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

try {
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex) {
 print "<p>error: $ex->getMessage() </p>\n\n";
 die();
}

foreach ($db->query('SELECT now()') as $row)
{
 print "<p>$row[0]</p>\n\n";
}

foreach ($db->query('SELECT * from scriptures') as $row)
{
 print "<p>$row[1] $row[2]:$row[3] - \"$row[4]\"</p>\n\n";
}
?>

</body>
</html>