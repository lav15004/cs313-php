<?php
include 'dbstuff.inc';
$sql_string = 'select id, name from topic';
$statement = $db->prepare(html_entity_decode($sql_string));
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo '<input type="checkbox" name="topics[]" value="' . $row['id'] . '" />'. $row['name'].'<br />';
}

?>
<input type="checkbox" name="topics[]" value="-1" /><input type="text" name="newtopic" id="newtopic">