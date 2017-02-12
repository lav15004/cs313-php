<?php
include 'dbstuff.inc';
if ($_POST) {
    $sql_string = "select user_id, pw_hash from ms_web_users where user_id='".$_POST["loginuserid"]."'";
    $statement = $db->prepare($sql_string);

    $statement->execute();
    $newId = $db->lastInsertId('ms-web_users_id_seq');
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $user_id = $row["user_id"];
        $pw_hash = $row["pw_hash"];
    }

    if (password_verify(filter_var($_POST["loginpassword"], FILTER_SANITIZE_STRING),$pw_hash)) {
        session_start();
        $_SESSION["user_id"] = $user_id;
        $_SESSION["auth"] = 'True';
        echo 'valid';
    } else {
        echo 'Bad User Name / Password combination.  Try again.';
    }
}
?>