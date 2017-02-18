<?php
include 'dbstuff.inc';
if ($_GET) {
    $sql_string = "select ms_project_id, project_name from ms_projects where ms_server_list_id=".$_GET['svalue'];
    $ms_project_id = $_GET['pvalue'];
    $statement = $db->prepare($sql_string);
    $statement->execute();
    echo '<option value="">Select Project...</option>';
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        if ($ms_project_id == $row['ms_project_id']){
            echo '<option selected="selected" value="' . $row['ms_project_id'] . '">' . $row['project_name'] . '</option>';
        } else {
            echo '<option value="' . $row['ms_project_id'] . '">' . $row['project_name'] . '</option>';
        }
    }
    $db = null;
} else {
    echo '<option value="">Select Project...</option>';
}
?>