<?php
include 'dbstuff.inc';
if ($_POST) {
    $sql_string = "INSERT INTO ms_web_users(user_id, full_name, pw_hash) values (?,?,?)";
    $statement = $db->prepare($sql_string);

    $statement->execute(array(filter_var($_POST["userid"], FILTER_SANITIZE_STRING),filter_var($_POST["fullname"],
        FILTER_SANITIZE_STRING),password_hash(filter_var($_POST["password"], FILTER_SANITIZE_STRING), PASSWORD_DEFAULT)));
    $newId = $db->lastInsertId('ms-web_users_id_seq');
}
echo filter_var($_POST["userid"], FILTER_SANITIZE_STRING);
?>