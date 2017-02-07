<?php
  include 'dbstuff.inc';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Scripture Resources - Search Page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/cs313-php.css">
</head>
<body>
<h1>Scripture Resources</h1>
<br />
<form method="post" action="">
  <label for="txt_book">Book:</label>
  <input type="text" name="txt_book" id="txt_book">
  <br />
  <label for="txt_Chapter">Chapter:</label>
  <input type="text" name="txt_Chapter" id="txt_Chapter">
  <br />
  <label for="txt_Verse">Verse:</label>
  <input type="text" name="txt_Verse" id="txt_Verse">
  <br />
  <label for="txt_Content">Content:</label>
  <input type="text" name="txt_Content" id="txt_Content">
  <br />
  <label for="cbl_Content">Topics:</label>
<!--  <input type="checkbox" name="topics[]" value="A" />testing<br />-->
  <br />
  <br />
    <?php
      $sql_string = 'select id, name from topic';
      $statement = $db->prepare(html_entity_decode($sql_string));
      $statement->execute();
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo '<input type="checkbox" name="topics[]" value="' . $row['id'] . '" />'. $row['name'].'<br />';
      }
    ?>
  <br />
  <button name="submit" type="submit">Submit</button>
</form>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchval = htmlspecialchars($_POST["searchval"]);

    echo "<br />";

    $sqlstring = 'SELECT id, book, chapter, verse from scriptures WHERE book = \''. html_entity_decode($searchval) .'\'';
    foreach ($db->query($sqlstring) as $row)
    {
        echo "<p><span id='scriptref'><a href='search_results.php?id=$row[0]'>$row[1] $row[2]:$row[3]</a></span></p>\n\n";
    }
}
?>
<br />
<hr>
<br />
<a href="week5group1.php">Initial Core Requirements Page</a>
</body>
</html>
