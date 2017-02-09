<?php
include 'dbstuff.inc';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $topics = $_POST["topics"];
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
    $topicvalue = "";
    foreach($topics as $topic){
        if($topic == "-1"){
            $topicvalue = $newTopicId;
        } else {
            $topicvalue = $topic;
        }
        $sql_string = "INSERT INTO scripturetopics (scripture_id, topic_id) values(?,?)";
        $statement = $db->prepare($sql_string);
        $statement->execute(array(strval($newId),strval($topicvalue)));
    }

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
