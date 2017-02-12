<?php
include 'dbstuff.inc';
if ($_POST) {
    $sql_string = "select user_id, pw_hash from ms_web_users where user_id=\"".$_POST["loginuserid"]."\"";
    $statement = $db->prepare($sql_string);

    $statement->execute(array(filter_var($_POST["userid"], FILTER_SANITIZE_STRING),filter_var($_POST["fullname"],
        FILTER_SANITIZE_STRING),password_hash(filter_var($_POST["password"], FILTER_SANITIZE_STRING), PASSWORD_DEFAULT)));
    $newId = $db->lastInsertId('ms-web_users_id_seq');
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $user_id = $row["user_id"];
        $pw_hash = $row["pw_hash"];
    }

    if (password_verify(filter_var($_POST["userid"], FILTER_SANITIZE_STRING),$pw_hash)) {
        echo 'valid';
    } else {
        echo 'Bad User name / password combination.';
    }
}
?>