<?php
include 'dbstuff.inc';
if ($_POST) {
    $sql_string = "select ms_project_id, project_name from ms_projects where ms_server_list_id="
        . $_GET["svalue"];
    $statement = $db->prepare($sql_string);
    $statement->execute();
    echo '<option value="">Select Project...</option>';
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo '<option value="' . $row['ms_project_id'] . '">' . $row['project_name'] . '</option>';
    }
    $db = null;
}
?>