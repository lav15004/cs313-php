<?php
  include 'dbstuff.inc';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo $_POST["newtopic"];
      if ($_POST["newtopic"]!=""){
          foreach($topics as $topic){
            if($topic == "-1"){
                $sql_string = "INSERT INTO topic (name) values (?)";
                $statement = $db->prepare($sql_string);
                $statement->execute(array($_POST["newtopic"]));
                $newTopicId = $db->lastInsertId('topic_id_seq');
            }
          }
      }
      $sql_string = "INSERT INTO scriptures (book, chapter, verse, content) values (?,?,?,?)";
      $statement = $db->prepare($sql_string);
      $statement->execute(array($_POST["txt_book"],$_POST["txt_Chapter"],$_POST["txt_Verse"],$_POST["txt_Content"]));
      $newId = $db->lastInsertId('scriptures_id_seq');
      $topics = $_POST["topics"];
      $topicvalue = "";
      foreach($topics as $topic){
          if($topic == -1){
             $topicvalue = $newTopicId;
          } else {
            $topicvalue = $topic;
          }
          $sql_string = "INSERT INTO scripturetopics (scripture_id, topic_id) values(?,?)";
          $statement = $db->prepare($sql_string);
          $statement->execute(array(strval($newId),strval($topicvalue)));
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Scripture Resources - Form Page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/cs313-php.css">
</head>
<body>
<h1>Scripture Resources</h1>
<br />
<form method="post" action="">

  <table>
    <tr>
      <td><label for="txt_book">Book:</label></td>
      <td><input type="text" name="txt_book" id="txt_book"></td>
    </tr>
    <tr>
      <td><label for="txt_Chapter">Chapter:</label></td>
      <td><input type="text" name="txt_Chapter" id="txt_Chapter"></td>
    </tr>
    <tr>
      <td><label for="txt_Verse">Verse:</label></td>
      <td><input type="text" name="txt_Verse" id="txt_Verse"></td>
    </tr>
    <tr>
      <td><label for="txt_Content">Content:</label></td>
      <td><input type="text" name="txt_Content" id="txt_Content"></td>
    </tr>
  </table>

  <br />
  <label for="cbl_Content">Topics:</label>
<!--  <input type="checkbox" name="topics[]" value="A" />testing<br />-->
  <br />
    <?php
      $sql_string = 'select id, name from topic';
      $statement = $db->prepare(html_entity_decode($sql_string));
      $statement->execute();
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo '<input type="checkbox" name="topics[]" value="' . $row['id'] . '" />'. $row['name'].'<br />';
      }

    ?>
  <input type="checkbox" name="topics[]" value="-1" /><input type="text" name="newtopic" id="newtopic">
  <br />
  <br />
  <button name="submit" type="submit">Submit</button>
</form>
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
