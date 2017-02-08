<?php
  include 'dbstuff.inc';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $sql_string = "INSERT INTO scriptures (book, chapter, verse, content) values (?,?,?,?)";
      $statement = $db->prepare($sql_string);
      $statement->execute(array($_POST["txt_book"],$_POST["txt_Chapter"],$_POST["txt_Verse"],$_POST["txt_Content"]));
      $newId = $db->lastInsertId('scriptures_id_seq');
      echo $newId;
      $topics = $_POST["topics"];
      foreach($topics as $topic){
        echo $topic;
          $sql_string = "INSERT INTO scripturetopics (scripture_id, topic_id) values(?,?)";
          $statement = $db->prepare($sql_string);
          $statement->execute(array(strval($newId),strval($topic)));
      }
  }
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


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$searchval = htmlspecialchars($_POST["searchval"]);

    echo "<br />";

    $sqlstring = 'select * from vw_script_topics';
    $id="";
    foreach ($db->query($sqlstring) as $row)
    {
      if ($id != $row["id"]) {
        if ($id !=""){
            echo "</span></p>\n\n";
        }
        $id = $row["id"];
          echo "<p><span id='scriptref'>".$row['book']." " . $row['chapter'] . ":".$row['verse'].
              " - Topic(s): " . $row["name"];
      } else {
        echo ", ".  $row["name"];
      }

    }
    echo "</span></p>\n\n";
}
?>
<br />
<hr>
<br />

</body>
</html>
