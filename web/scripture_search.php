<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Scripture Resources</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/cs313-php.css">
</head>
<body>
<h1>Scripture Resources</h1>
<br />
<form method="post" action="#">
    <label for="searchval">Enter search term:</label>
    <input type="text" name="searchval" id="searchval">
</form>
<?php
include 'dbstuff.inc';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchval = htmlspecialchars($_POST["searchval"]);
    include 'dbstuff.inc';



    foreach ($db->query('SELECT book, chapter, verse from scriptures WHERE 
        book = $searchval') as $row)
    {
        print "<p><span id='scriptref'>$row[0] $row[1]:$row[2]</span></p>\n\n";
    }
}
?>
</body>
</html>
