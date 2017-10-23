<?php

// Password security is !!really important!! for the KU EECS department
$mysqli = new mysqli('mysql.eecs.ku.edu', 'jhegna', 'P@$$word123', 'jhegna');

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "INSERT INTO tb_users (user_id) VALUES ('" . $_POST['user_id'] . "');";

if($_POST['user_id'] != '' && $mysqli->query($query)) {
    echo "Nice username! The database accepted it. Hope you didn't inject anything!";
} else {
    echo "Oops, something went wrong! The username either already existed, was empty, or something else went horribly wrong.";
}

?>