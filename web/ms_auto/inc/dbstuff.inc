<?php
// default Heroku Postgres configuration URL
$dbUrl = getenv('HEROKU_POSTGRESQL_OLIVE_URL');

if (empty($dbUrl)) {
  // example localhost configuration URL with postgres username and a database called cs313db
  print "<p>No Remote or local Postgres server found!</p>\n\n";
  die();
}

$dbopts = parse_url($dbUrl);
$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

try {
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex) {
 print "<p>error: $ex->getMessage() </p>\n\n";
 die();
}
?>